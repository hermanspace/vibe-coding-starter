# Perintah harian proyek ini. Ketik "make help" untuk melihat daftarnya.
# Setiap baris "nama: ## keterangan" otomatis tampil di make help.

COMPOSE = docker compose
APP     = $(COMPOSE) exec app
NODE    = $(COMPOSE) run --rm node

.DEFAULT_GOAL := help

help: ## Tampilkan daftar perintah ini
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | awk 'BEGIN {FS = ":.*?## "}; {printf "  make %-10s %s\n", $$1, $$2}'

setup: ## Pertama kali: copy .env, build container, composer/npm install, key:generate, migrate, seed
	@test -f .env || cp .env.example .env
	$(COMPOSE) build
	$(COMPOSE) up -d
	$(APP) composer install
# Kunci aplikasi hanya dibuat sekali. Kalau dibuat ulang, semua orang otomatis keluar.
	@grep -q '^APP_KEY=base64:' .env || $(APP) php artisan key:generate
	$(APP) php artisan migrate --seed
	$(MAKE) build
	@echo ""
	@echo "Selesai. Buka http://localhost:8000"

up: ## Nyalakan semua container
	$(COMPOSE) up -d

update: ## Setelah git pull: composer install, build aset, migrasi
	$(APP) composer install
	$(MAKE) build
	$(APP) php artisan migrate

down: ## Matikan semua container
	$(COMPOSE) down

migrate: ## Jalankan migrasi database
	$(APP) php artisan migrate

fresh: ## Kosongkan database lalu migrasi + seed ulang (hanya lokal!)
	@read -p "Semua data akan dihapus. Lanjut? (y/N) " jawab; [ "$$jawab" = "y" ] || exit 1
	$(APP) php artisan migrate:fresh --seed

logs: ## Tampilkan log app dan nginx
	$(COMPOSE) logs -f --tail=100 app nginx

shell: ## Masuk ke dalam container app
	$(APP) bash

test: ## Jalankan tes Pest
	$(APP) php artisan test

build: ## Build aset CSS/JS lewat container node
	$(NODE) sh -c "npm install && npm run build"

deploy: ## Di server: git pull, build, migrate --force, optimize, restart
	git pull
	$(COMPOSE) build
	$(COMPOSE) up -d
	$(APP) composer install --no-dev --optimize-autoloader
	$(MAKE) build
	$(APP) php artisan migrate --force
	$(APP) php artisan optimize
	$(COMPOSE) restart app nginx

backup: ## Dump database ke folder backups/
	@mkdir -p backups
	$(COMPOSE) exec -T mysql sh -c 'mysqldump -u root -p"$$MYSQL_ROOT_PASSWORD" "$$MYSQL_DATABASE"' > backups/$(shell date +%Y%m%d-%H%M%S).sql
	@ls -1t backups | head -1 | sed 's/^/Tersimpan: backups\//'

.PHONY: help setup up update down migrate fresh logs shell test build deploy backup

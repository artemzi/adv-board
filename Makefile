# check tabs cat -e -t -v  Makefile
docker-up:
	docker-compose up -d

docker-down:
	docker-compose down

docker-build:
	docker-compose up --build -d

test:
	docker exec board_php-cli_1 vendor/bin/phpunit --colors=always

assets-install:
	docker exec board_node_1 yarn install

assets-dev:
	docker exec board_node_1 yarn run dev

assets-watch:
	docker exec board_node_1 yarn run watch

perm:
	sudo chown $USER:$USER bootstrap/cache -R
	sudo chown $USER:$USER storage -R
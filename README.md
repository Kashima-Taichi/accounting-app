## 家庭用経理システム(収支管理システム)

ターミナルを起動下記コマンドを実行
docker-compose up -d --build
http://127.0.0.1:10080/
でアクセス可能

docker-compose down　を実行で停止

## MySQLのコンテナに接続する方法

${}の中には.envファイルの変数が入ります
docker-compose exec db bash -c 'mysql -u${MYSQL_USER} -p${MYSQL_PASSWORD} ${MYSQL_DATABASE}'

## データベースのマイグレーション方法

・マイグレーションファイルの作成
php artisan make:migration create_trashed_costs_table
                                   ↑テーブル名

・マイグレーションファイル編集後のマイグレーション実行(phpコンテナの中に入って実行する)
docker-compose exec app ash
php artisan migrate
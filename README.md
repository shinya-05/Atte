#　アプリケーション名
- Atte（アット）
  ある企業の勤怠管理システム
  ![alt text](<スクリーンショット 2024-10-27 22.51.29.png>)

## 作成した目的
- 人事評価のため

## アプリケーションURL
- 作成中

## 機能一覧
- ログイン機能、メール認証機能、勤務状態によるボタン制御、勤務時間/休憩時間管理、日付別勤怠管理、社員別勤怠管理

## 使用技術(実行環境)
- PHP8.3.0
- Laravel8.83.27
- MySQL8.0.26

## テーブル設計
- ![alt text](image-1.png)

## ER図
- ![alt text](image-2.png)


## 環境構築
**Dockerビルド**
1. `git clone git@github.com:shinya-05/Atte.git`
2. DockerDesktopアプリを立ち上げる
3. `docker-compose up -d --build`

> *MacのM1・M2チップのPCの場合、`no matching manifest for linux/arm64/v8 in the manifest list entries`のメッセージが表示されビルドができないことがあります。
エラーが発生する場合は、docker-compose.ymlファイルの「mysql」内に「platform」の項目を追加で記載してください*
``` bash
mysql:
    platform: linux/x86_64(この文追加)
    image: mysql:8.0.26
    environment:
```

**Laravel環境構築**
1. `docker-compose exec php bash`
2. `composer install`
3. 「.env.example」ファイルを 「.env」ファイルに命名を変更。または、新しく.envファイルを作成
4. .envに以下の環境変数を追加
``` text
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel_db
DB_USERNAME=laravel_user
DB_PASSWORD=laravel_pass
```
5. アプリケーションキーの作成
``` bash
php artisan key:generate
```

6. マイグレーションの実行
``` bash
php artisan migrate
```

7. シーディングの実行
``` bash
php artisan db:seed
```


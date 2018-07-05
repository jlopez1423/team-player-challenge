**Instructions for Running**
1. Seed Team and Players DB:
   - Run php artisan db:seed --class=TeamsTableSeeder
2. Run php artisan passport:install to setup login auth
3 Run php artisan db:seed --class=UsersTablesSeeder
4. Login at teamplayer.test/login 
   - Credentials:
       - email: testdev@gmail.com
       - pass: secret

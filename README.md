Laravel + Vite CMS for upload data and one rest endpoint

1. Run project with:
    php artisan serve 
    npm run dev
2. Run database migration to generate pets and owner as well as users
    php artisan migrate:fresh --seed

   About project
   - Without loging on welcome page are listed pets 
   - After logging user can access panel for adding pet if have no one.
   - Can see list with opetion to edit or add new record.
   - Admins can see all pats and delete record


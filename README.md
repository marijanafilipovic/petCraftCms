Laravel 9 + Vite CMS for upload data and one rest endpoint

1. Run project with:
    php artisan serve 
    npm run dev
2. Run database migration to generate pets and owner as well as users
    php artisan migrate:fresh --seed
3. For Admin role test, the field in table users -> model should be changed from 'cumstomer' to 'admin'

   About project
   - Without loging on welcome page are listed pets 
   - After logging user can access panel for adding pet if have no one.
   - Can see list with opetion to edit or add new record.
   - Admins can see all pats and delete record

    Restendpoint:
    - For all pets: http://localhost:8000/api/v1/pets
    - Single specific by ID : http://localhost:8000/api/v1/pets/1

SPEC. 
    To EventServiceProvider added:
        PetObserver used to delete images from public storage on update or delete

WEB ROUTES
    Used as suggested

Without of use php artisan migrate:fresh --seed
    first registrated user will be admin, all after will be simple user
    

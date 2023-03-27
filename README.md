Laravel 9 + Vite CMS for upload data and one rest endpoint

1. Run project with:
    php artisan serve 
    npm run dev
2. Run database migration to generate pets and owner as well as users
    php artisan migrate:fresh --seed
3. For Admin role test, the field in table users -> model should be changed from 'customer' to 'admin'

   About project
   - Without logging on welcome page are listed pets 
   - After logging user can access panel for adding pet, and after adding one can see and make a changes.
   - User can see list of his pets with option to edit or add new record.
   - Admins can see all pets and delete record

    Rest url:
    - For all pets: http://localhost:8000/api/v1/pets
    - Single specific by ID : http://localhost:8000/api/v1/pets/1

SPEC. 
    To EventServiceProvider added:
        PetObserver used to delete images from public storage on update or delete

WEB ROUTES
    Used as suggested

Without of use php artisan migrate:fresh --seed
    first registrated user will be admin, all after will be simple user
    

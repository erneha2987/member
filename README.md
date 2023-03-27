# School Members Management System

A demo Laravel application that allows users to add new members with the fields "Name", "Email Address", and add schools and associate members with them. The application also displays all members for a selected school.

## Installation

1. Clone the repository:
```
git clone https://github.com/yourusername/yourrepository.git
```

2. Change to the project directory:
```
cd yourrepository
```

3. Install the dependencies using Composer:
```
composer install
```

4. Copy the `.env.example` file to create your own `.env` file:
```
cp .env.example .env
```

5. Generate an application key:
```
php artisan key:generate
```

6. Update the `.env` file with your database credentials:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password
```

7. Run the migrations for the database to create tables:
```
php artisan migrate
```

8. Start the local development server:
```
php artisan serve
```

Now, you can access the project at `http://127.0.0.1:8000`.

## Usage

1. To add a new member, navigate to the "Members" page and click on add member, fill in the "Name", "Email Address"fields.
2. Then click on School and add school and fill the deatils of school and select members to associate.
3. Then click on members and select any members and click on view associated schools to see schools.

## Testing

To run the test suite, execute the following command:

```
php artisan test
```
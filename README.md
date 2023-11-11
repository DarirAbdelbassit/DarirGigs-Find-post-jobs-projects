# DarirGigs - Find Jobs and Projects

DarirGigs is a modern web application developed using Laravel and Tailwind CSS. This platform serves as a central hub for job seekers and project enthusiasts, allowing users to explore, submit, and manage job or project listings seamlessly.

## Description

DarirGigs provides a user-friendly experience for both visitors and logged-in users. Key features include:

- **Explore Listings:** Visitors can browse through all job and project listings, gaining insights into available opportunities.

- **Search Functionality:** A powerful search feature allows users to find specific jobs or projects based on names or tags.

- **User Authentication:** Registered users can log in to the platform to submit new listings, edit their existing posts, and delete them when necessary.

- **Submission and Management:** Users have the ability to submit new job or project listings, providing comprehensive details. They can also manage their submissions effortlessly.

## Project Screenshots



## Installation

To run DarirGigs on your local machine, follow these steps:

1. Clone the repository:

    ```bash
    git clone https://github.com/DarirAbdelbassit/DarirGigs-Find-post-jobs-projects.git
    ```

2. Navigate to the project directory:

    ```bash
    cd DarirGigs-Find-post-jobs-projects
    ```

3. Install the necessary dependencies:

    ```bash
    composer install
    ```

4. Create a copy of the `.env.example` file and rename it to `.env`. Open the `.env` file and set up your database configuration.

5. Generate the application key:

    ```bash
    php artisan key:generate
    ```

6. Run database migrations:

    ```bash
    php artisan migrate --seed
    ```

7. Install npm dependencies:

    ```bash
    npm install
    ```

8. Start the local development server:

    ```bash
    php artisan serve
    ```

9. Open your web browser and go to `http://localhost:8000` to access DarirGigs.

## Usage

- Explore a wide range of job and project opportunities.
- Use the search functionality to find specific listings by name or tag.
- Log in to submit new listings, edit existing posts, and manage your submissions.

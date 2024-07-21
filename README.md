# Notepad Application with Laravel Livewire

A simple Notepad application built with Laravel and Livewire. This application enables users to create, edit, and delete notes. Each note includes a title, content, and a due date. The user interface is designed using Bootstrap for a modern, responsive experience.

## Features

-   **Create Notes:** Add new notes with a title, content, and due date.
-   **Edit Notes:** Modify existing notes, including updating the title, content, and due date.
-   **Delete Notes:** Remove notes that are no longer needed.
-   **Bootstrap Design:** Utilizes Bootstrap to ensure a clean user interface.
-   **Livewire Integration:** Provides real-time interactions without requiring full page reloads.

## Technologies Used

-   **Laravel:** PHP framework for building web applications.
-   **Livewire:** Full-stack framework for Laravel that facilitates dynamic interfaces.
-   **Bootstrap:** CSS framework for responsive design.

## Installation

### Requirement

Make sure, you have Docker and Git installed and configured.

Fllow these steps to set up the application on your local environment:

1. **Clone the Repository:**

    ```bash
    git clone https://github.com/ajkcodes/notewire
    cd notewire
    composer install
    npm install
    cp .env.example .env
    php artisan key:generate
    ```

2. **Start the Docker container**

    ```bash
    docker-compose up -d --build
    ```

3. **Usage**

    - Open your browser and go to http://localhost:8000 to use the application.
    - Have fun.

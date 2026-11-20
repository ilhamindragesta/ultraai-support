# UltraAI Support

An AI customer support chatbot prototype built with PHP and CodeIgniter 4.

## Live Demo

https://ai.ultracoding.klikberes.id

**Demo status:** Demo Mode is enabled. Chat replies are simulated using predefined PHP logic. Live OpenAI API responses have not yet been tested because API billing is not activated.

## Features

- Responsive customer support dashboard.
- Interactive chat playground.
- REST API endpoint for chat messages.
- Server-side input validation.
- Simulated responses for demonstration.
- OpenAI API integration architecture.
- Environment-based configuration.

## Technology Stack

- PHP 8.3
- CodeIgniter 4
- JavaScript
- HTML5 and CSS3
- MariaDB
- OpenAI GPT-4.1 mini integration architecture

## API Endpoint

POST /api/chat

Example request:

    {
      "message": "Hello, what services do you offer?"
    }

## Installation

1. Clone this repository.
2. Run composer install.
3. Copy env to .env.
4. Configure database credentials in .env.
5. Configure the OpenAI API key on the server when live API access is available.
6. Set the web server document root to the project's public directory.

## Security

Never commit .env, API keys, database passwords, or other credentials.

## Current Limitations

- Demo Mode uses simulated responses, not a live language model.
- Live OpenAI API integration is prepared but has not been verified with a successful API request.
- Persistent conversation storage and a full knowledge-base management module are not implemented yet.

## Author

Ultracoding

GitHub: https://github.com/ilhamindragesta

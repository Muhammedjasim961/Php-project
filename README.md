# Weather Fetcher Application

The **Weather Fetcher Application** fetches real-time weather data from the **OpenWeather API**, processes and stores it in a MySQL database, and provides an API endpoint for retrieving stored weather data for specific cities.

## Features

- **Fetch weather data** for a specified city from the OpenWeather API.
- **Store weather data** in a MySQL database, including city, temperature, humidity, and description.
- **Retrieve stored weather data** via a RESTful API endpoint.
- **Automatic data updates** via a cron job for periodic updates every 30 minutes.

## Prerequisites

Ensure the following are installed on your machine:

- **PHP** version >= 7.4
- **MySQL** or **MariaDB**
- **XAMPP** or a similar local server stack (for running the application locally)
- A **valid OpenWeather API key** (you can get one [here](https://openweathermap.org/api)).

## Installation

### Step 1: Clone the Repository

Clone this repository to your local machine:

```bash
git clone https://github.com/yourusername/weather-fetcher.git
cd weather-fetcher
```

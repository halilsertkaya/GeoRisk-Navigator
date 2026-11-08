# GeoRisk-Navigator

An interactive web-based Geographic Information System (GIS) designed to map and analyze earthquake and landslide risk zones.

## 🚀 Features
- **Leaflet.js** for dynamic, lightweight, and mobile-friendly map rendering.
- **PostgreSQL / PostGIS** extension for spatial data management and querying.
- **PHP PDO** backend architecture using a lightweight RESTful API structure.
- Interactive point-and-click data insertion directly from the map interface.
- Dynamic color-coded risk levels (Low, Medium, High) with detailed popup descriptions.

## 🛠️ Installation Guide
1. Enable the PostGIS extension in your PostgreSQL database:
   ```sql
   CREATE EXTENSION postgis;
2. Create the required database table:

   ``` SQL
   CREATE TABLE risk_points (
    id SERIAL PRIMARY KEY,
    title VARCHAR(150) NOT NULL,
    category VARCHAR(50) NOT NULL,
    risk_level VARCHAR(20) NOT NULL,
    description TEXT,
    geom GEOMETRY(Point, 4326)
   );

3. Update your database credentials inside db_connect.php.

4. Deploy the project to your local server environment and run index.html.

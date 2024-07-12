# Gym Data Base

This repository contains the SQL scripts and documentation for the IronFitGym database, designed to manage various aspects of a gym chain with locations in five different cities. The database is structured to handle information about locations, departments, employees, promotions, products, and equipment. Below is a summary of the tables included in the database:

## Tables Description

### LOCATIE (Location)
- **id_locatie**: Represents a specific location.
- **Attributes**: 
  - **strada_locatie**: Street name.
  - **numar_locatie**: Street number.
  - **numar_strada**: Additional street information.
  - **oras**: City.
  - **nume_locatie**: Location name.
- **Purpose**: Identifies the address of the five IronFitGym locations, each in a different city.

### DEPARTAMENT (Department)
- **id_departament**: Represents the distribution of employees within a location.
- **Attributes**: 
  - **nume_departament**: Department name.
  - **id_locatie**: Location ID to separate departments by location.
- **Purpose**: Organizes departments across different gym locations.

### ANGAJAT (Employee)
- **id_angajat**: Represents employees across all locations.
- **Attributes**: 
  - **id_departament**: Department ID to associate employees with their respective departments.
  - **Personal Information**: Contains personal details of each employee.
- **Purpose**: Manages employee data, linking them to their departments and locations.

### PROMOTIE (Promotion)
- **id_promotie**: Represents a discount applicable to products.
- **Attributes**: 
  - **Procent**: Discount percentage.
  - **Perioada**: Validity period of the promotion.
- **Purpose**: Applies discounts to products, with a 0% discount for products without a subscription.

### PRODUS (Product)
- **id_produs**: Represents a product sold at each location.
- **Attributes**: 
  - **Product Details**: Includes necessary details about the product.
  - **id_departament**: Department ID managing the sales (departments with IDs 2, 7, 12, 17, 22).
- **Purpose**: Manages product information and sales department associations.

### ECHIPAMENT (Equipment)
- **id_echipament**: Represents the equipment used by gym clients.
- **Attributes**: 
  - **id_locatie**: Location ID where the equipment is used.
  - **nume_echipament**: Equipment name.
  - **data_achizitie**: Acquisition date.
- **Purpose**: Tracks gym equipment, including location and acquisition details.

## Running the Database

To set up and run the IronFitGym database, you need to use XAMPP with Apache and MySQL modules enabled. Follow these steps:

1. **Install XAMPP**: Download and install XAMPP from the [official website](https://www.apachefriends.org/index.html).
2. **Start Apache and MySQL**: Open the XAMPP control panel and start the Apache and MySQL services.
3. **Import SQL Script**: Use phpMyAdmin (included with XAMPP) to import the provided SQL script into your MySQL database.
4. **Configure Database**: Ensure the database configuration settings match your environment (e.g., username, password).

This setup will enable you to manage and query the IronFitGym database efficiently. For detailed instructions and SQL scripts, refer to the files in this repository.

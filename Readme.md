# Walamoo Tax Information System (TIFS) — User Interface Design

> A desktop tax collection and management application with XML data parsing, guided/ad-hoc query systems, threshold monitoring, and accessibility-compliant UI design for the fictional Walamoo City governing council.

---

## Table of Contents
- [Project Overview](#project-overview)
- [Key Features](#key-features)
- [Tech Stack](#tech-stack)
- [System Requirements](#system-requirements)
- [Architecture & Design](#architecture--design)
- [Data Model](#data-model)
- [Installation & Setup](#installation--setup)
- [Usage](#usage)
- [Query System](#query-system)
- [Thresholds & Alerts](#thresholds--alerts)
- [Accessibility Features](#accessibility-features)
- [Testing](#testing)
- [Project Structure](#project-structure)
- [Screenshots](#screenshots)
- [Future Enhancements](#future-enhancements)
- [License](#license)

---

## Project Overview

**Walamoo Tax Information System (TIFS)** is a comprehensive tax collection and management desktop application designed for the fictional Walamoo City governing council. The system enables tax officials to:

- Import and manage taxpayer data from XML files
- Execute guided and ad-hoc queries against tax records
- Monitor tax collection thresholds and generate compliance alerts
- Reconcile bank deposits against recorded tax payments
- Generate reports in standard text format and Digital Frequency Language (DFL)
- Track user login/logout activity for audit purposes

This project was developed an **assignment** for COMP3435 User-Interface Design at The University of the West Indies, emphasizing **user-centered design principles**, **accessibility compliance**, and **intuitive interaction models**.

---

## Key Features

### Core Functionality
| Feature | Description |
|---------|-------------|
| **XML Data Import** | Load taxpayer records from structured XML files with validation and error handling |
| **Data Reload** | Replace existing dataset with new XML data while maintaining system integrity |
| **Dashboard Overview** | Display total records, annual tax revenue, country/city counts, and geographic breakdown |
| **Guided Query Builder** | Form-based queries for listing and sorting by company, country, city, or tax amount |
| **Ad-Hoc Query Language** | Command-line style query interface with syntax validation (`list`, `total` commands) |
| **Threshold Monitoring** | Configurable minimum tax, deadline month, minimum revenue, and minimum company thresholds |
| **Alert System** | Automated notifications for companies that paid/did not pay by deadline |
| **Bank Reconciliation** | Compare bank statement deposits against system-recorded tax totals |
| **Report Generation** | Export query results to timestamped text files with record counts |
| **DFL Translation** | Convert reports to Digital Frequency Language for accessibility |
| **User Authentication** | Secure login with 3-attempt lockout and session tracking |
| **Accessibility Compliance** | Customizable text colors (black/blue/green) per Walamoo Disabilities Protection Act |

### UI/UX Design Features
- **Storyboard-driven design** — Three usage scenarios explored before implementation
- **Wireframe prototyping** — PowerPoint-based interactive wireframes for stakeholder review
- **User-centered interaction model** — Designed for tax officials with varying technical expertise
- **Consistent navigation** — Clear, logical screen sequences with intuitive layout
- **Audio/haptic feedback** — Accessibility features for visually impaired users
- **Error prevention** — Syntax validation for ad-hoc queries and confirmation dialogs for destructive actions

---

## Tech Stack

| Layer | Technology |
|-------|------------|
| **Programming Language** | Java / Python / C# (per group choice) |
| **UI Framework** | JavaFX / Tkinter / Windows Forms / WPF |
| **Data Parsing** | XML DOM/SAX Parser |
| **File I/O** | Text file generation with timestamp headers |
| **Version Control** | Git |
| **Design Tools** | Microsoft PowerPoint (wireframes), Microsoft Word (documentation) |
| **Documentation** | User manual with glossary, justifications, and AI prompt documentation |

---

## System Requirements

### Functional Requirements
1. **Startup Dashboard** — Display aggregate statistics: total records, total tax paid, country count, city count, with expandable city-per-country view
2. **XML File Loading** — Parse `<tifs>` XML structure with `<taxpayer>` elements containing `id`, `company`, `street`, `city`, `country`, and `tax` fields
3. **Query System** — Support both guided (GUI form) and ad-hoc (command language) query methods
4. **Threshold Management** — Configure and monitor `minimum_tax`, `deadline_month`, `minimum_revenue`, `minimum_companies`
5. **Alert Generation** — Trigger alerts for `company_did_not_pay` and `company_did_pay` events
6. **Bank Reconciliation** — Compare external bank statement totals against internal tax records
7. **Report Export** — Save query results to user-selected text files with automatic timestamp and record count
8. **DFL Translation** — Convert any report to Digital Frequency Language format
9. **User Authentication** — Login with 3-attempt lockout, session logging (manager-only view)
10. **Accessibility** — Configurable text colors (black/blue/green) with permanent preference option

### XML Data Format
```xml
<tifs>
  <taxpayer id="2452">
    <company>Food Fashion Inc</company>
    <street>Berley Street</street>
    <city>Bridgetown</city>
    <country>Barbados</country>
    <tax>201220</tax>
  </taxpayer>
</tifs>
```

---

## Architecture & Design

### Design Methodology
This project followed a **user-centered design process** with three major phases:

1. **Storyboarding** — Explored three real-world usage scenarios to understand user needs, environmental constraints, and interaction patterns
2. **Wireframing** — Created interactive PowerPoint prototypes based on storyboard insights
3. **Implementation** — Developed the functional UI with justified design choices traced back to earlier phases

### UI Design Principles Applied
- **Usability** — Intuitive navigation, clear labels, consistent interaction patterns
- **User-Centeredness** — Designed for tax officials with domain-appropriate terminology
- **Accessibility** — Color contrast compliance, audio feedback, customizable display preferences
- **Performance** — Efficient query processing, responsive UI even with large datasets
- **Domain Relevance** — Tax-specific terminology and workflows matching real government processes

---

## Data Model

### Taxpayer Entity
| Field | Type | Description |
|-------|------|-------------|
| `id` | Integer | Unique company tax identifier |
| `company` | String | Company name |
| `street` | String | Street address |
| `city` | String | City name |
| `country` | String | Country name |
| `tax` | Decimal | Tax payment amount (multiple records per company for installments) |

### Aggregate Statistics
- **Total Records** — Count of all `<taxpayer>` entries
- **Total Tax Paid** — Sum of all `<tax>` values
- **Country Count** — Distinct countries in dataset
- **City Count** — Distinct cities in dataset
- **Cities Per Country** — Hierarchical breakdown for geographic analysis

---

## Installation & Setup

### Prerequisites
- Java JDK 17+ (or Python 3.10+ / .NET 6+ depending on implementation)
- Git
- IDE (IntelliJ IDEA, PyCharm, or Visual Studio)

### Step-by-Step Setup

```bash
# 1. Clone the repository
git clone https://github.com/Zkeem1/Walamoo-Tax-Project.git
cd Walamoo-Tax-Project

# 2. Open in your IDE and build the project
# For Java: Import as Maven/Gradle project
# For Python: Create virtual environment
python -m venv venv
source venv/bin/activate  # Linux/Mac
venv\Scripts\activate   # Windows
pip install -r requirements.txt

# 3. Run the application
# Java: Run Main.java or Main.class
# Python: python main.py
# C#: Run via Visual Studio or dotnet run
```

---

## Usage

### Default Login
| Role | Username | Password |
|------|----------|----------|
| Employee | employee | password |
| Manager | manager | password |

### Main Workflow
1. **Login** — Enter credentials (3 attempts max before lockout)
2. **Select Color Preference** — Choose black, blue, or green text (can be made permanent)
3. **Load XML Data** — Select taxpayer XML file; system validates and reports success/failure
4. **View Dashboard** — Review aggregate statistics and geographic breakdown
5. **Run Queries** — Use guided query builder or ad-hoc command language
6. **Monitor Thresholds** — Set and check minimum tax, deadline month, revenue targets
7. **Generate Reports** — Export results to timestamped text files or DFL format
8. **Bank Reconciliation** — Enter bank statement total and compare against system records
9. **View Audit Log** — Manager-only: review user login/logout history

### Ad-Hoc Query Examples
```
list company 5          # List first 5 companies alphabetically
list country            # List all records sorted by country
total tax               # Display total tax revenue
total city              # Count distinct cities
```

---

## Query System

### Guided Queries (GUI Form)
| Query Type | Description |
|------------|-------------|
| **List by Company Name** | Sort records alphabetically by company |
| **List by Total Taxes Paid** | Sort by aggregated tax per company (highest to lowest) |
| **List by Country** | Group and sort records by country |

### Ad-Hoc Query Language
**List Command:**
```
list <attribute> [limit]
```
- `attribute`: `company`, `country`, `city`
- `limit`: Optional number of records to display

**Total Command:**
```
total <attribute>
```
- `attribute`: `company` (taxpayer count), `country` (country count), `city` (city count), `tax` (total revenue)

**Syntax Validation:**
- Commands checked for correct format before execution
- Invalid syntax triggers user-friendly error messages with correction guidance

---

## Thresholds & Alerts

### Thresholds
| Thres<response clipped><NOTE>Result is longer than **10000 characters**, will be **truncated**.</NOTE>


## Screenshots

### Tax Information Dashboard
![Dashboard](screenshots/dashboard.png)
*Real-time aggregate statistics: 1,000 taxpayer records, $1,000,000 total tax, 50 countries, 200 cities*

### XML Data Upload
![Upload](screenshots/upload.png)
*Import taxpayer data from XML files with validation, save controls, and reload capability*

### Ad-Hoc Query Interface
![Query](screenshots/query.png)
*Dual-mode query system with language selection, execute options, and text file export*

### Homepage Navigation
![Homepage](screenshots/homepage.png)
*Main landing page with quick access to Tax Information Systems, Query Builder, and Reconciliation*

### Navigation Menu
![Navigation](screenshots/navigation.png)
*Expanded dropdown revealing Monthly Scenarios, Thresholds Settings, Help Center, and Logout*

### Login Page
![Login](screenshots/login.png)
*Secure authentication with accessibility settings and password recovery*

### Registration Form
![Registration](screenshots/registration.png)
*Comprehensive taxpayer registration with personal details, location, and tax identification*

# Turnkey Multilingual Corporate & Translation Agency Website Template

[![PHP](https://img.shields.io/badge/PHP-8.1%20%7C%208.2%20%7C%208.3-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://www.php.net)
[![i18n](https://img.shields.io/badge/Bilingual-ES%20%2F%20EN-orange?style=for-the-badge)](https://en.wikipedia.org/wiki/Internationalization_and_localization)
[![Bootstrap](https://img.shields.io/badge/Bootstrap-Responsive%20Grid-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white)](https://getbootstrap.com)
[![Docker](https://img.shields.io/badge/Docker-Compose-2496ED?style=for-the-badge&logo=docker&logoColor=white)](https://www.docker.com)
[![PHPMailer](https://img.shields.io/badge/PHPMailer-SMTP%20Attachments-blue?style=for-the-badge)](https://github.com/PHPMailer/PHPMailer)
[![License](https://img.shields.io/badge/License-MIT-green?style=for-the-badge)](LICENSE)

A production-ready, fully responsive turnkey website template designed for **professional translation agencies**, **certified legal interpreters**, **multilingual corporate consulting firms**, and **international document legalization bureaus**. Built with automatic browser-based language detection, dedicated bilingual landing pages (English / Spanish), and an asynchronous document quotation request system with file attachment handling.

---

## 🌟 Key Highlights & Template Architecture

- **Automatic Language Detection**: Smart entrypoint (`index.html`) detects visitor browser preferences (`window.navigator.language`) and immediately routes visitors to the matching `/en/` or `/es/` portal.
- **Dedicated Localized Hubs**:
  - `/es/`: Spanish corporate portal highlighting legal translations, certified official stamps, ministry apostilles, technical engineering manuals, and fast WhatsApp dispatch.
  - `/en/`: English corporate portal optimized for international corporations, embassy filings, sworn legal affidavits, and overseas business partnerships.
- **Quotation Form with Document Attachment**: Frontline lead form supporting direct document upload (PDF, DOCX, scans) dispatched via secure SMTP through `Mailer.php`.
- **Environment-Aware SMTP Backend**: Configurable via standard environment variables (`SMTP_HOST`, `SMTP_USER`, `SMTP_PASSWORD`, `NOTIFICATION_EMAIL`) with TLS/SSL encryption support.
- **Zero Heavy CMS Overhead**: Blazing-fast static asset delivery and lightweight PHP transactional processing with sub-second page loads.

---

## 🏗️ Architecture & Component Topology

```
+-------------------------------------------------------------+
|                     Client Browser                          |
+-------------------------------------------------------------+
                              |
                              v
+-------------------------------------------------------------+
|               Smart Language Router (index.html)            |
|       - If navigator.language is English -> /en/            |
|       - Otherwise -> /es/ (Default / Spanish)               |
+-------------------------------------------------------------+
               /                              \
              v                                v
+----------------------------+  +----------------------------+
|      English Portal        |  |      Spanish Portal        |
|          (/en/)            |  |          (/es/)            |
|  - Sworn Legal Translation |  |  - Traducción Oficial      |
|  - Medical & Technical     |  |  - Apostillas y Legalidad  |
|  - Embassy Document Filing |  |  - Cotización Inmediata    |
+----------------------------+  +----------------------------+
              \                                /
               v                              v
+-------------------------------------------------------------+
|             Transactional Mailer Engine (Mailer.php)        |
|  - Attachment Processing (PDF, DOCX, Images)                |
|  - PHPMailer with TLS 587 / SSL 465                         |
|  - Dispatches leads directly to agency inbox                |
+-------------------------------------------------------------+
```

---

## 🚀 Quick Start with Docker Compose

Run the bilingual translation agency website locally in seconds:

### 1. Clone the Repository
```bash
git clone git@github.com-personal:KevinAndrey96/ansftranslations.git
cd ansftranslations
```

### 2. Launch the Web Service
```bash
docker compose up -d
```

### 3. Access the Portals
- **Auto Router**: [http://localhost:8084](http://localhost:8084)
- **English Portal**: [http://localhost:8084/en/](http://localhost:8084/en/)
- **Spanish Portal**: [http://localhost:8084/es/](http://localhost:8084/es/)

---

## 💻 Manual Deployment (cPanel / Apache / Nginx)

1. Upload all repository files to your web root (`public_html/` or `/var/www/html/`).
2. Verify that PHP 8.1, 8.2 or 8.3 is enabled on your host.
3. Configure your outbound SMTP server settings in `Mailer.php` or export them as environment variables:
   ```ini
   SMTP_HOST="mail.youragency.com"
   SMTP_USER="quotes@youragency.com"
   SMTP_PASSWORD="your_smtp_password"
   NOTIFICATION_EMAIL="contact@youragency.com"
   SITE_URL="https://youragency.com"
   ```
4. Test the quotation form by submitting a request with a sample document attachment.

---

## 📦 Service Scope Configured in the Template

| Service Category | Spanish Portal (`/es/`) | English Portal (`/en/`) |
| :--- | :--- | :--- |
| **Official & Certified** | Traducciones Oficiales con Sello y Firma | Certified & Sworn Legal Translations |
| **Legal & Apostilles** | Apostillas, Registros Civiles y Poderes | Embassy Filing, Notarized Affidavits |
| **Technical & Medical** | Manuales de Ingeniería y Farmacología | Technical Manuals & Medical Records |
| **Business & Financial** | Estados Financieros y Contratos B2B | Financial Statements & Corporate B2B |
| **Simultaneous Interpreting** | Intérpretes para Conferencias y Juicios | Conference & Courtroom Interpreters |

---

## 🛡️ License

Maintained for developer portfolio demonstration and production turnkey website deployment.

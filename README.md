<h1 align="center">
klog: Minimalist Blogging Website 💬
</h1>

<p align="center">
<img src="resources/assets/images/logo.png" alt="Klog Logo" width="50%">
</p>

**klog** is a simple and elegant blogging platform designed for those who appreciate minimalism. With a clean interface and a focus on essential features, **klog** provides an uncluttered space for sharing news, blogs, and thoughts.

## Features

- **Minimalistic Design**: Clean lines, ample white space, and a soothing color palette create a calming reading experience.
- **Up-to-Date Content**: Stay informed with the latest news and blog posts.
- **User-Friendly Interface**: Intuitive navigation ensures that users can focus on what matters most: the content.
- **Responsive**: Works seamlessly on desktop, tablet, and mobile devices.
- **Tagging System**: Organize posts with relevant tags for easy discovery.
- **Commenting**: Engage with readers through thoughtful comments.
- **Search Functionality**: Quickly find specific articles or topics.
- **Author Profiles**: Highlight contributors and their expertise.

## Getting Started

1. **Installation**:
   - Clone this repository: 
   ```bash 
   git clone https://github.com/BinyamMamo/klog.git
   ```
   - Install Laravel dependencies: 
   ```bash
   composer install
   ```
   - Set up your `.env` file with database credentials.
   - Run migrations: 
    ```bash
    php artisan migrate
    ```
   - Start the development server: 
   ```bash
   php artisan serve
   ```

2. **Configuration**:
   - Customize the site title, logo, and colors in the configuration files (`config/app.php` and `config/klog.php`).

3. **Adding Content**:
   - Create new blog posts in the `resources/views/posts` directory.
   - Use Blade templates for formatting.

4. **Deployment**:
   - Deploy your site to a hosting service of your choice (e.g., Heroku, DigitalOcean, or shared hosting).

## Contributing

Contributions are welcome! If you'd like to improve **klog**, feel free to submit pull requests or open issues.

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

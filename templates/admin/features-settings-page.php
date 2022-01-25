<div class="wrap">
    <h1><?php esc_html_e(get_admin_page_title()); ?></h1>
    <h2><?php esc_html_e('Configure SMS settings','wpsema') ?></h2>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link" href="<?php echo admin_url('admin.php?page=wpsema_settings'); ?>">Account</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Features</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">License</a>
        </li>
    </ul>
    <div class="card w-100">
        <div class="card-body">
        
        <div class="row">
            <div class="col-lg-7">
                <form method="post" action="options.php">
                    <!-- Display necessary hidden fields for settings -->
                    <?php settings_fields('wpsema_woo_settings'); ?>
                    <!-- Display the settings sections for the page -->
                    <?php do_settings_sections('wpsema_features'); ?>
                    <!-- Default Submit button -->
                    <?php submit_button(); ?>
                </form>
            </div>
            
        </div>

        </div>
    </div>
</div>
<div class="wrap">
    <h1><?php esc_html_e(get_admin_page_title()); ?></h1>
    <h2><?php esc_html_e('Send a quick SMS','wpsema') ?></h2>
    <div class="card">
        <div class="card-body">
            <form action="send_sms.php">
            <div class="mb-3 w-25">
                <label for="sender_id" class="form-label">Sender name</label>
                    <input type="text" class="form-control" id="sender_id" placeholder="The name that will show as sender">
                </div>
                <div class="mb-3">
                    <label for="receipient" class="form-label">Destination</label>
                    <select class="form-select" id="receipient" aria-label="Default select example">
                    <option selected>Select who to send it to</option>
                        <option value="1">Wordpress Users</option>
                        <option value="2">Woocommerce Customers</option>
                        <option value="3">Subscribers</option>
                    </select>
                </div>
                <div class="mb-3 w-50">
                    <label for="message" class="form-label">Message</label>
                    <textarea class="form-control" id="message" rows="5"></textarea>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-lg btn-success">Send</button>
                </div>
            </form>
        </div>
    </div>
</div>
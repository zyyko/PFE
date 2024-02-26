<!-- Font Awesome CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<style>
    .footer-part {
        background-color: black;
        color: white;
        display: flex;
        justify-content: space-around; /* Added to evenly distribute the divs */
        padding: 20px 0; /* Added some padding for spacing */
        height: 50vh;
    }
    .footer-part > div {
        flex: 1;
        padding: 0 20px; /* Added padding for spacing between content and separator line */
        border-right: 1px solid rgba(255, 255, 255, 0.3); /* Added separator line */
    }
    .footer-part > div:last-child {
        border-right: none; /* Remove border from the last div to avoid extra separator line */
    }
    i {
        font-size: 24px; /* Adjust icon size */
        margin-right: 10px; /* Added margin for spacing between icons */
    }
</style>

<div class="footer-part">
    <div>
        <h1>Bookify</h1>
        <p>Thank you for choosing Bookify. Stay updated with our latest products and promotions by following us on social media.</p>
    </div>
    <div>
        <h3>About</h3>
        <p>Who are we</p>
        <p>Why Bookify</p>  
    </div>
    <div>
        <h3>Need Help ?</h3>    
        <p>Contact us</p>
        <div>
            <i class="fab fa-facebook-f"></i>
            <i class="fab fa-instagram"></i>
        </div>
    </div>
</div>

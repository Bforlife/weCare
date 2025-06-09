// hide & show categories
    $(document).ready(function () {
        $(".dropdown-container").hide();

        $("#categoriesDropdown").click(function () {

            $(".dropdown-container").toggle(); 
        });
    });

  

     // toogle the menu btn for smaller screen size.
     $(document).ready(function() {
        $('#menu-btn').click(function() {
            const sidebar = $('#sidebar');
            if (sidebar.css('left') === '-250px') {
                sidebar.animate({ left: '0' }, 300); 
            } else {
                sidebar.animate({ left: '-250px' }, 300); 
            }
        });
    });
    
    $(window).resize(function () {
        if ($(window).width() > 768) {
            // allows sidebar to remain visible on larger screens
            $('#sidebar').css('left', '0'); 
        } else {
            $('#sidebar').css('left', '-250px');
        }
    }).trigger('resize'); 
    
    // admin_nav script ends

// model display

$(document).ready(function () {
    const modal = $('#productModal');
    const modalImage = $('#modalImage');
    const modalTitle = $('#modalTitle');
    const modalPrice = $('#modalPrice');
    const productColor = $('#productColor');
    const productQuantity = $('#productQuantity');

    // Open modal on product card click
    $('.product-card .fa-eye').on('click', function () {
        const card = $(this).closest('.product-card');
        const imageSrc = card.find('img').attr('src');
        const title = card.find('h3').text();
        const price = card.find('.price').text();

        // Populate modal with product details
        modalImage.attr('src', imageSrc);
        modalTitle.text(title);
        modalPrice.text(price);

        productColor.val('Red'); 
        productQuantity.val(1);

        modal.fadeIn();
    });

    // Close modal when 'x' is clicked
    $('.close').on('click', function () {
        modal.fadeOut();
    });

});





// script for details page (allows the prdtImg to update when clicked)

$(document).ready(function () {
    $('.thumbnail-gallery img').on('click', function () {
        const clickedImg = $(this).attr('src');
        $('.main-image').attr('src', clickedImg);
    });
});


// script for checkOut page(form validation)
// Example starter JavaScript for disabling form submissions if there are invalid fields
(() => {
    'use strict'
  
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    const forms = document.querySelectorAll('.needs-validation')
  
    // Loop over them and prevent submission
    Array.from(forms).forEach(form => {
      form.addEventListener('submit', event => {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }
  
        form.classList.add('was-validated')
      }, false)
    })
  })()
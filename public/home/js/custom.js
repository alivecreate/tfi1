$('.two_controls').toggle('.top-form');

$(".box-shadow1").hover(function(){
    // var listItem = $( "#bar" );
    
    // alert( "Index: " + $( ".box-shadow1" ).index( this ) );
    // $( ".box-shadow1" ).index( this ).addClass("box-text-light");
    
    // $(this).addClass("active");

    // var index = $( ".box-shadow1" ).index( this );
    // // alert(index);
    // // $(`.box-shadow1:eq(`+ 3 +`)`).addClass("box-text-light");

    // // $(`.feature-box .fbox-content h3:eq(`+index+`)`).addClass("box-text-light");
    // // $(`.feature-box .fbox-content h3:eq(`+index+`)`).removeClass("box-text-dark");


    // if(index == 0){
       
    // $(`.feature-box .fbox-content h3:eq(`+index+`)`).addClass("box-text-light");
    // $(`.feature-box .fbox-content h3:eq(`+index+`)`).removeClass("box-text-dark");
    // }
    // else if(index == 1){
        
    // $(`.feature-box .fbox-content h3:eq(`+index+`)`).addClass("box-text-light");
    // $(`.feature-box .fbox-content h3:eq(`+index+`)`).removeClass("box-text-dark");
    //  }
    //  else if(index ==2){
        
    // $(`.feature-box .fbox-content h3:eq(`+index+`)`).addClass("box-text-light");
    // $(`.feature-box .fbox-content h3:eq(`+index+`)`).removeClass("box-text-dark");
    //   }
    //   else if(index == 3){
          
    // $(`.feature-box .fbox-content h3:eq(`+index+`)`).addClass("box-text-light");
    // $(`.feature-box .fbox-content h3:eq(`+index+`)`).removeClass("box-text-dark");
    //    }
    // else{
    //     $.each([0, 1, 2, 3], (_, n) => {
    //         $(`.feature-box .fbox-content h3:eq(`+ n +`)`).addClass("box-text-dark");
    //     });
    // }

}, function(index){
    // alert(JSON.stringify(index));

    // var index = $( ".box-shadow1" ).index( this );
    // $(this).removeClass("active");

    // if(index == 0){
    //     $.each([1, 2, 3], (_, n) => {
    //         $(`.feature-box .fbox-content h3:eq(`+ n +`)`).removeClass("box-text-light");
    //         $(`.feature-box .fbox-content h3:eq(`+ n +`)`).addClass("box-text-dark");
    //     });
    // }
    // else if(index == 1){
    //      $.each([0, 2, 3], (_, n) => {
    //          $(`.feature-box .fbox-content h3:eq(`+ n +`)`).removeClass("box-text-light");
    //          $(`.feature-box .fbox-content h3:eq(`+ n +`)`).addClass("box-text-dark");
    //      });
    //  }
    //  else if(index ==2){
    //       $.each([0, 1, 3], (_, n) => {
    //           $(`.feature-box .fbox-content h3:eq(`+ n +`)`).removeClass("box-text-light");
    //           $(`.feature-box .fbox-content h3:eq(`+ n +`)`).addClass("box-text-dark");
    //       });
    //   }
    //   else if(index == 3){
    //        $.each([0, 1, 2], (_, n) => {
    //            $(`.feature-box .fbox-content h3:eq(`+ n +`)`).removeClass("box-text-light");
    //            $(`.feature-box .fbox-content h3:eq(`+ n +`)`).addClass("box-text-dark");
    //        });
    //    }
    // else{
    //     $.each([0, 1, 2, 3], (_, n) => {
    //         $(`.feature-box .fbox-content h3:eq(`+ n +`)`).removeClass("box-text-light");
    //         $(`.feature-box .fbox-content h3:eq(`+ n +`)`).addClass("box-text-dark");
    //     });
    // }

    // $(".box-shadow1:eq( 1 )").addClass("active");
    
    // // $(`.feature-box .fbox-content h3`).removeClass("box-text-light");
    // // $(".feature-box .fbox-content h3").removeClass("box-text-light");
    // // $(".feature-box .fbox-content h3").addClass("box-text-dark");

    // if(!$(".box-shadow1:eq( 1 )")){
    //     $(this).removeClass("active");

    // }
    
 
    // $( ".link-hover-toggel" )
    // .mouseout(function() {
        
    //     $(this).css('background','red');
    // })
    // .mouseover(function() {
        
    //     $(this).css('background','green');
    // });
    
    $( ".link-hover-toggel" ).hover(
        function() {
            alert('enter');
          $( this ).append( $( "<span> ***</span>" ) );
        }, function() {
          $( this ).find( "span" ).last().remove();
        }
      );
 
      
})
$('.owl-carousel').owlCarousel({
    // stagePadding: 0,
    // loop:true,
    // margin:10,
    // nav: false,
    // autoplay: true,
    // slideTransition: 'linear',
    // autoplayTimeout: 3000,
    // autoplaySpeed: 3000,
    // autoplayHoverPause: true,
    // responsive:{
    //     0:{
    //         items:2
    //     },
    //     600:{
    //         items:3
    //     },
    //     1000:{
    //         items:5
    //     }
    // }
})

// $( ".link-hover-toggel img" ).hover(
//     function() {
//         // alert('enter');
//       $( this ).append( $( "<span> ***</span>" ) );
//     }, function() {
//       $( this ).find( "span" ).last().remove();
//     }
// );


<script src="{{asset('assets/js/core/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/core/popper.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/core/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>

<script src="{{asset('assets/js/plugins/bootstrap-switch.js')}}"></script>

<script src="{{asset('assets/js/plugins/nouislider.min.js')}}" type="text/javascript"></script>

<script src="{{asset('assets/js/plugins/glide.js')}}" type="text/javascript"></script>

<script src="{{asset('assets/js/plugins/moment.min.js')}}"></script>

<script src="{{asset('assets/js/plugins/choices.min.js')}}" type="text/javascript"></script>

<script src="{{asset('assets/js/plugins/datetimepicker.js')}}" type="text/javascript"></script>

<script src="{{asset('assets/js/plugins/jasny-bootstrap.min.js')}}"></script>

<script src="{{asset('assets/js/plugins/headroom.min.js')}}"></script>





<script async defer src="https://buttons.github.io/buttons.js"></script>
<script src="{{asset('assets/js/argon-design-system.min.js?v=1.0.2')}}" type="text/javascript"></script> 
<script src="{{asset('assets/demo/jquery.sharrre.js')}}"></script>



<script>

    $(document).ready(function(){
    
        // Code for the Validator
        var $validator = $('#login-form').validate({



            rules: {
    
                email: {
                    email: true,
                    required: true,
                    minlength: 3,
                },
    
                password: {
                    required: true,
                    minlength: 8,
                },
    
    
    
            },
    
            highlight: function(element) {
                $(element).parent('div').parent('div').removeClass('has-success').addClass('has-error');
            },
    
            success: function(element) {
                $(element).parent('div')
                    .removeClass('has-error')
                    .addClass('has-success');

                $(element).parent('div').children('.error').remove();
            },
    
            errorPlacement : function(error, element) {
                $(element).parent('div').parent('div').append(error);
                $(element).parent('div').parent('div').addClass('has-error');
            }
    
        });
    
    });
    
</script>


@yield('other-js')


<script src="{{asset('assets/js/plugins/jquery.validate.min.js')}}"></script>

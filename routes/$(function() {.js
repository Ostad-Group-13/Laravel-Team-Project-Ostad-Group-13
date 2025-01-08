 $(function() {
            $('.toggle-class').change(function() {
                var status = $(this).prop('checked') == true ? 1 : 0;
                var product_id = $(this).data('id');

                // axios.get("{{ route('recipe.status') }}")

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '/recipe.status/'+status+,
                    data: {
                        'status': status,
                        'product_id': product_id
                    },
                    success: function(data) {
                        console.log(data.success)
                    }
                });
            })
        });
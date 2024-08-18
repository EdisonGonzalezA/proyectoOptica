<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script src="https://www.paypal.com/sdk/js?client-id=ARgrqcmfePkfx7-eT355JVOq9IpPyoKlg1Nh6Gz7abJbsEMo2_vbDg-t92v_7kxwXtUe9UEWCADsXoES&currency=USD">

    </script>
</head>
<body>
    <div id = "paypal-buttonconteiner"></div>

    <script>
        paypal.Buttons({
            style:{
                color:'blue',
                shape: 'pill',
                label: 'pay'
            },
            createOrder:function(data,actions){
                return actions.order.create({
                    purchase_units:[{
                        amount:{
                            value:'0.1'
                        }
                    }]
                });
            },
            onApprove:function(data,actions){
                actions.order.capture().then(function(detalles){
                    window.location.href = "completado.html"
                });
            },
            onCancel:function(data){
                alert('Pago cancelado');
                console.log(data);
            }
           /* */
        }).render('#paypal-buttonconteiner');
    </script>
</body>
</html>
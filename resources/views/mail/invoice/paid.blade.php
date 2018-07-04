@component('mail::message')
# Introdução

Obrigado por gerar este pedido de pagamento, use o link a seguir para continuar.

@component('mail::button', ['url' => 'https://schoolofnet.com'])
Pagar
@endcomponent

Obrigado,<br>
{{ config('app.name') }}
@endcomponent

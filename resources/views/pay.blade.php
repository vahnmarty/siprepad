<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
        html {
            line-height: 1.15;
            -webkit-text-size-adjust: 100%
        }

        body {
            margin: 0
        }

        a {
            background-color: transparent
        }

        [hidden] {
            display: none
        }

        html {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
            line-height: 1.5
        }

        *,
        :after,
        :before {
            box-sizing: border-box;
            border: 0 solid #e2e8f0
        }

        a {
            color: inherit;
            text-decoration: inherit
        }

        svg,
        video {
            display: block;
            vertical-align: middle
        }

        video {
            max-width: 100%;
            height: auto
        }

        .bg-white {
            --bg-opacity: 1;
            background-color: #fff;
            background-color: rgba(255, 255, 255, var(--bg-opacity))
        }

        .bg-gray-100 {
            --bg-opacity: 1;
            background-color: #f7fafc;
            background-color: rgba(247, 250, 252, var(--bg-opacity))
        }

        .border-gray-200 {
            --border-opacity: 1;
            border-color: #edf2f7;
            border-color: rgba(237, 242, 247, var(--border-opacity))
        }

        .border-t {
            border-top-width: 1px
        }

        .flex {
            display: flex
        }

        .grid {
            display: grid
        }

        .hidden {
            display: none
        }

        .items-center {
            align-items: center
        }

        .justify-center {
            justify-content: center
        }

        .font-semibold {
            font-weight: 600
        }

        .h-5 {
            height: 1.25rem
        }

        .h-8 {
            height: 2rem
        }

        .h-16 {
            height: 4rem
        }

        .text-sm {
            font-size: .875rem
        }

        .text-lg {
            font-size: 1.125rem
        }

        .leading-7 {
            line-height: 1.75rem
        }

        .mx-auto {
            margin-left: auto;
            margin-right: auto
        }

        .ml-1 {
            margin-left: .25rem
        }

        .mt-2 {
            margin-top: .5rem
        }

        .mr-2 {
            margin-right: .5rem
        }

        .ml-2 {
            margin-left: .5rem
        }

        .mt-4 {
            margin-top: 1rem
        }

        .ml-4 {
            margin-left: 1rem
        }

        .mt-8 {
            margin-top: 2rem
        }

        .ml-12 {
            margin-left: 3rem
        }

        .-mt-px {
            margin-top: -1px
        }

        .max-w-6xl {
            max-width: 72rem
        }

        .min-h-screen {
            min-height: 100vh
        }

        .overflow-hidden {
            overflow: hidden
        }

        .p-6 {
            padding: 1.5rem
        }

        .py-4 {
            padding-top: 1rem;
            padding-bottom: 1rem
        }

        .px-6 {
            padding-left: 1.5rem;
            padding-right: 1.5rem
        }

        .pt-8 {
            padding-top: 2rem
        }

        .fixed {
            position: fixed
        }

        .relative {
            position: relative
        }

        .top-0 {
            top: 0
        }

        .right-0 {
            right: 0
        }

        .shadow {
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06)
        }

        .text-center {
            text-align: center
        }

        .text-gray-200 {
            --text-opacity: 1;
            color: #edf2f7;
            color: rgba(237, 242, 247, var(--text-opacity))
        }

        .text-gray-300 {
            --text-opacity: 1;
            color: #e2e8f0;
            color: rgba(226, 232, 240, var(--text-opacity))
        }

        .text-gray-400 {
            --text-opacity: 1;
            color: #cbd5e0;
            color: rgba(203, 213, 224, var(--text-opacity))
        }

        .text-gray-500 {
            --text-opacity: 1;
            color: #a0aec0;
            color: rgba(160, 174, 192, var(--text-opacity))
        }

        .text-gray-600 {
            --text-opacity: 1;
            color: #718096;
            color: rgba(113, 128, 150, var(--text-opacity))
        }

        .text-gray-700 {
            --text-opacity: 1;
            color: #4a5568;
            color: rgba(74, 85, 104, var(--text-opacity))
        }

        .text-gray-900 {
            --text-opacity: 1;
            color: #1a202c;
            color: rgba(26, 32, 44, var(--text-opacity))
        }

        .underline {
            text-decoration: underline
        }

        .antialiased {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale
        }

        .w-5 {
            width: 1.25rem
        }

        .w-8 {
            width: 2rem
        }

        .w-auto {
            width: auto
        }

        .grid-cols-1 {
            grid-template-columns: repeat(1, minmax(0, 1fr))
        }

        @media (min-width:640px) {
            .sm\:rounded-lg {
                border-radius: .5rem
            }

            .sm\:block {
                display: block
            }

            .sm\:items-center {
                align-items: center
            }

            .sm\:justify-start {
                justify-content: flex-start
            }

            .sm\:justify-between {
                justify-content: space-between
            }

            .sm\:h-20 {
                height: 5rem
            }

            .sm\:ml-0 {
                margin-left: 0
            }

            .sm\:px-6 {
                padding-left: 1.5rem;
                padding-right: 1.5rem
            }

            .sm\:pt-0 {
                padding-top: 0
            }

            .sm\:text-left {
                text-align: left
            }

            .sm\:text-right {
                text-align: right
            }
        }

        @media (min-width:768px) {
            .md\:border-t-0 {
                border-top-width: 0
            }

            .md\:border-l {
                border-left-width: 1px
            }

            .md\:grid-cols-2 {
                grid-template-columns: repeat(2, minmax(0, 1fr))
            }
        }

        @media (min-width:1024px) {
            .lg\:px-8 {
                padding-left: 2rem;
                padding-right: 2rem
            }
        }

        @media (prefers-color-scheme:dark) {
            .dark\:bg-gray-800 {
                --bg-opacity: 1;
                background-color: #2d3748;
                background-color: rgba(45, 55, 72, var(--bg-opacity))
            }

            .dark\:bg-gray-900 {
                --bg-opacity: 1;
                background-color: #1a202c;
                background-color: rgba(26, 32, 44, var(--bg-opacity))
            }

            .dark\:border-gray-700 {
                --border-opacity: 1;
                border-color: #4a5568;
                border-color: rgba(74, 85, 104, var(--border-opacity))
            }

            .dark\:text-white {
                --text-opacity: 1;
                color: #fff;
                color: rgba(255, 255, 255, var(--text-opacity))
            }

            .dark\:text-gray-400 {
                --text-opacity: 1;
                color: #cbd5e0;
                color: rgba(203, 213, 224, var(--text-opacity))
            }
        }
    </style>

    <style>
        body {
            font-family: 'Nunito';
        }
    </style>
</head>

<body class="antialiased">
    @php
        $months = [1 => 'Jan', 2 => 'Feb', 3 => 'Mar', 4 => 'Apr', 5 => 'May', 6 => 'Jun', 7 => 'Jul', 8 => 'Aug', 9 => 'Sep', 10 => 'Oct', 11 => 'Nov', 12 => 'Dec'];
    @endphp
    <!-- Company Overview section START -->
    <section class="container-fluid inner-Page">
        <div class="card-panel">
            <div class="media wow fadeInUp" data-wow-duration="1s">
                <div class="companyIcon">
                </div>
                <div class="media-body">

                    <div class="container">
                        @if (session('success_msg'))
                            <div class="alert alert-success fade in alert-dismissible show">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true" style="font-size:20px">×</span>
                                </button>
                                {{ session('success_msg') }}
                            </div>
                        @endif
                        @if (session('error_msg'))
                            <div class="alert alert-danger fade in alert-dismissible show">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true" style="font-size:20px">×</span>
                                </button>
                                {{ session('error_msg') }}
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-md-6">
                                <h1>Payment</h1>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-md-6"
                                style="background: lightgreen; border-radius: 5px; padding: 10px;">
                                <div class="panel panel-primary">
                                    <div class="creditCardForm">
                                        <div class="payment">
                                            <form id="payment-card-info" method="post"
                                                action="{{ route('dopay.online') }}">
                                                @csrf
                                                <div class="row">
                                                    <div class="form-group owner col-md-8">
                                                        <label for="owner">Owner</label>
                                                        <input type="text" class="form-control" id="owner"
                                                            name="owner" value="{{ old('owner') }}" required>
                                                        <span id="owner-error" class="error text-red">Please enter owner
                                                            name</span>
                                                    </div>
                                                    <div class="form-group CVV col-md-4">
                                                        <label for="cvv">CVV</label>
                                                        <input type="number" class="form-control" id="cvv"
                                                            name="cvv" value="{{ old('cvv') }}" required>
                                                        <span id="cvv-error" class="error text-red">Please enter
                                                            cvv</span>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-8" id="card-number-field">
                                                        <label for="cardNumber">Card Number</label>
                                                        <input type="text" class="form-control" id="cardNumber"
                                                            name="cardNumber" value="{{ old('cardNumber') }}" required>
                                                        <span id="card-error" class="error text-red">Please enter valid
                                                            card
                                                            number</span>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="amount">Amount</label>
                                                        <input type="number" class="form-control" id="amount"
                                                            name="amount" min="1" value="{{ old('amount') }}"
                                                            required>
                                                        <span id="amount-error" class="error text-red">Please enter
                                                            amount</span>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-6" id="expiration-date">
                                                        <label>Expiration Date</label><br />
                                                        <select class="form-control" id="expiration-month"
                                                            name="expiration-month"
                                                            style="float: left; width: 100px; margin-right: 10px;">
                                                            @foreach ($months as $k => $v)
                                                                <option value="{{ $k }}"
                                                                    {{ old('expiration-month') == $k ? 'selected' : '' }}>
                                                                    {{ $v }}</option>
                                                            @endforeach
                                                        </select>
                                                        <select class="form-control" id="expiration-year"
                                                            name="expiration-year" style="float: left; width: 100px;">

                                                            @for ($i = date('Y'); $i <= date('Y') + 15; $i++)
                                                                <option value="{{ $i }}">
                                                                    {{ $i }}
                                                                </option>
                                                            @endfor
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-6" id="credit_cards"
                                                        style="margin-top: 22px;">
                                                        <img src="{{ asset('images/visa.jpg') }}" id="visa">
                                                        <img src="{{ asset('images/mastercard.jpg') }}"
                                                            id="mastercard">
                                                        <img src="{{ asset('images/amex.jpg') }}" id="amex">
                                                    </div>
                                                </div>

                                                <br />
                                                <div class="form-group" id="pay-now">
                                                    <button type="submit" class="btn btn-success themeButton"
                                                        id="confirm-purchase">Confirm Payment</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-1"></div>
                            <div class="col-md-5" style="background: lightblue; border-radius: 5px; padding: 10px;">
                                <h3>Sample Data</h3>
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <th>
                                                Owner
                                            </th>
                                            <td>
                                                Simon
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                CVV
                                            </th>
                                            <td>
                                                123
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                Card Number
                                            </th>
                                            <td>
                                                4111 1111 1111 1111
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                Amount
                                            </th>
                                            <td>
                                                99
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                Expiration Date
                                            </th>
                                            <td>
                                                {{ date('M') . '-' . (date('Y') + 2) }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="clearfix"></div>
    </section>
</body>

</html>

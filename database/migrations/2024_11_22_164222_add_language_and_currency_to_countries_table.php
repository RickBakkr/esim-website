<?php

use App\Models\Country;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        $countryData = $countryData = [
            ['code' => 'AF', 'name' => 'Afghanistan', 'default_language' => 'fa', 'default_currency' => 'AFN'],
            ['code' => 'AL', 'name' => 'Albania', 'default_language' => 'sq', 'default_currency' => 'ALL'],
            ['code' => 'DZ', 'name' => 'Algeria', 'default_language' => 'ar', 'default_currency' => 'DZD'],
            ['code' => 'AD', 'name' => 'Andorra', 'default_language' => 'ca', 'default_currency' => 'EUR'],
            ['code' => 'AO', 'name' => 'Angola', 'default_language' => 'pt', 'default_currency' => 'AOA'],
            ['code' => 'AR', 'name' => 'Argentina', 'default_language' => 'es', 'default_currency' => 'ARS'],
            ['code' => 'AM', 'name' => 'Armenia', 'default_language' => 'hy', 'default_currency' => 'AMD'],
            ['code' => 'AU', 'name' => 'Australia', 'default_language' => 'en', 'default_currency' => 'AUD'],
            ['code' => 'AT', 'name' => 'Austria', 'default_language' => 'de', 'default_currency' => 'EUR'],
            ['code' => 'AZ', 'name' => 'Azerbaijan', 'default_language' => 'az', 'default_currency' => 'AZN'],
            ['code' => 'BS', 'name' => 'Bahamas', 'default_language' => 'en', 'default_currency' => 'BSD'],
            ['code' => 'BH', 'name' => 'Bahrain', 'default_language' => 'ar', 'default_currency' => 'BHD'],
            ['code' => 'BD', 'name' => 'Bangladesh', 'default_language' => 'bn', 'default_currency' => 'BDT'],
            ['code' => 'BB', 'name' => 'Barbados', 'default_language' => 'en', 'default_currency' => 'BBD'],
            ['code' => 'BY', 'name' => 'Belarus', 'default_language' => 'be', 'default_currency' => 'BYN'],
            ['code' => 'BE', 'name' => 'Belgium', 'default_language' => 'nl', 'default_currency' => 'EUR'],
            ['code' => 'BZ', 'name' => 'Belize', 'default_language' => 'en', 'default_currency' => 'BZD'],
            ['code' => 'BJ', 'name' => 'Benin', 'default_language' => 'fr', 'default_currency' => 'XOF'],
            ['code' => 'BT', 'name' => 'Bhutan', 'default_language' => 'dz', 'default_currency' => 'BTN'],
            ['code' => 'BO', 'name' => 'Bolivia', 'default_language' => 'es', 'default_currency' => 'BOB'],
            ['code' => 'BA', 'name' => 'Bosnia and Herzegovina', 'default_language' => 'bs', 'default_currency' => 'BAM'],
            ['code' => 'BW', 'name' => 'Botswana', 'default_language' => 'en', 'default_currency' => 'BWP'],
            ['code' => 'BR', 'name' => 'Brazil', 'default_language' => 'pt', 'default_currency' => 'BRL'],
            ['code' => 'BN', 'name' => 'Brunei', 'default_language' => 'ms', 'default_currency' => 'BND'],
            ['code' => 'BG', 'name' => 'Bulgaria', 'default_language' => 'bg', 'default_currency' => 'BGN'],
            ['code' => 'BF', 'name' => 'Burkina Faso', 'default_language' => 'fr', 'default_currency' => 'XOF'],
            ['code' => 'BI', 'name' => 'Burundi', 'default_language' => 'fr', 'default_currency' => 'BIF'],
            ['code' => 'KH', 'name' => 'Cambodia', 'default_language' => 'km', 'default_currency' => 'KHR'],
            ['code' => 'CM', 'name' => 'Cameroon', 'default_language' => 'fr', 'default_currency' => 'XAF'],
            ['code' => 'CA', 'name' => 'Canada', 'default_language' => 'en', 'default_currency' => 'CAD'],
            ['code' => 'CV', 'name' => 'Cape Verde', 'default_language' => 'pt', 'default_currency' => 'CVE'],
            ['code' => 'CF', 'name' => 'Central African Republic', 'default_language' => 'fr', 'default_currency' => 'XAF'],
            ['code' => 'TD', 'name' => 'Chad', 'default_language' => 'fr', 'default_currency' => 'XAF'],
            ['code' => 'CL', 'name' => 'Chile', 'default_language' => 'es', 'default_currency' => 'CLP'],
            ['code' => 'CN', 'name' => 'China', 'default_language' => 'zh', 'default_currency' => 'CNY'],
            ['code' => 'CO', 'name' => 'Colombia', 'default_language' => 'es', 'default_currency' => 'COP'],
            ['code' => 'KM', 'name' => 'Comoros', 'default_language' => 'fr', 'default_currency' => 'KMF'],
            ['code' => 'CG', 'name' => 'Congo', 'default_language' => 'fr', 'default_currency' => 'XAF'],
            ['code' => 'CR', 'name' => 'Costa Rica', 'default_language' => 'es', 'default_currency' => 'CRC'],
            ['code' => 'HR', 'name' => 'Croatia', 'default_language' => 'hr', 'default_currency' => 'EUR'],
            ['code' => 'CU', 'name' => 'Cuba', 'default_language' => 'es', 'default_currency' => 'CUP'],
            ['code' => 'CY', 'name' => 'Cyprus', 'default_language' => 'el', 'default_currency' => 'EUR'],
            ['code' => 'CZ', 'name' => 'Czech Republic', 'default_language' => 'cs', 'default_currency' => 'CZK'],
            ['code' => 'DK', 'name' => 'Denmark', 'default_language' => 'da', 'default_currency' => 'DKK'],
            ['code' => 'DJ', 'name' => 'Djibouti', 'default_language' => 'fr', 'default_currency' => 'DJF'],
            ['code' => 'DM', 'name' => 'Dominica', 'default_language' => 'en', 'default_currency' => 'XCD'],
            ['code' => 'DO', 'name' => 'Dominican Republic', 'default_language' => 'es', 'default_currency' => 'DOP'],
            ['code' => 'EC', 'name' => 'Ecuador', 'default_language' => 'es', 'default_currency' => 'USD'],
            ['code' => 'EG', 'name' => 'Egypt', 'default_language' => 'ar', 'default_currency' => 'EGP'],
            ['code' => 'SV', 'name' => 'El Salvador', 'default_language' => 'es', 'default_currency' => 'USD'],
            ['code' => 'GQ', 'name' => 'Equatorial Guinea', 'default_language' => 'es', 'default_currency' => 'XAF'],
            ['code' => 'ER', 'name' => 'Eritrea', 'default_language' => 'ti', 'default_currency' => 'ERN'],
            ['code' => 'EE', 'name' => 'Estonia', 'default_language' => 'et', 'default_currency' => 'EUR'],
            ['code' => 'SZ', 'name' => 'Eswatini', 'default_language' => 'en', 'default_currency' => 'SZL'],
            ['code' => 'ET', 'name' => 'Ethiopia', 'default_language' => 'am', 'default_currency' => 'ETB'],
            ['code' => 'FJ', 'name' => 'Fiji', 'default_language' => 'en', 'default_currency' => 'FJD'],
            ['code' => 'FI', 'name' => 'Finland', 'default_language' => 'fi', 'default_currency' => 'EUR'],
            ['code' => 'FR', 'name' => 'France', 'default_language' => 'fr', 'default_currency' => 'EUR'],
            ['code' => 'GA', 'name' => 'Gabon', 'default_language' => 'fr', 'default_currency' => 'XAF'],
            ['code' => 'GM', 'name' => 'Gambia', 'default_language' => 'en', 'default_currency' => 'GMD'],
            ['code' => 'GE', 'name' => 'Georgia', 'default_language' => 'ka', 'default_currency' => 'GEL'],
            ['code' => 'DE', 'name' => 'Germany', 'default_language' => 'de', 'default_currency' => 'EUR'],
            ['code' => 'GH', 'name' => 'Ghana', 'default_language' => 'en', 'default_currency' => 'GHS'],
            ['code' => 'GR', 'name' => 'Greece', 'default_language' => 'el', 'default_currency' => 'EUR'],
            ['code' => 'GT', 'name' => 'Guatemala', 'default_language' => 'es', 'default_currency' => 'GTQ'],
            ['code' => 'GN', 'name' => 'Guinea', 'default_language' => 'fr', 'default_currency' => 'GNF'],
            ['code' => 'GW', 'name' => 'Guinea-Bissau', 'default_language' => 'pt', 'default_currency' => 'XOF'],
            ['code' => 'GY', 'name' => 'Guyana', 'default_language' => 'en', 'default_currency' => 'GYD'],
            ['code' => 'HT', 'name' => 'Haiti', 'default_language' => 'fr', 'default_currency' => 'HTG'],
            ['code' => 'HN', 'name' => 'Honduras', 'default_language' => 'es', 'default_currency' => 'HNL'],
            ['code' => 'HK', 'name' => 'Hong Kong', 'default_language' => 'zh', 'default_currency' => 'HKD'],
            ['code' => 'HU', 'name' => 'Hungary', 'default_language' => 'hu', 'default_currency' => 'HUF'],
            ['code' => 'IS', 'name' => 'Iceland', 'default_language' => 'is', 'default_currency' => 'ISK'],
            ['code' => 'IN', 'name' => 'India', 'default_language' => 'hi', 'default_currency' => 'INR'],
            ['code' => 'ID', 'name' => 'Indonesia', 'default_language' => 'id', 'default_currency' => 'IDR'],
            ['code' => 'IR', 'name' => 'Iran', 'default_language' => 'fa', 'default_currency' => 'IRR'],
            ['code' => 'IQ', 'name' => 'Iraq', 'default_language' => 'ar', 'default_currency' => 'IQD'],
            ['code' => 'IE', 'name' => 'Ireland', 'default_language' => 'en', 'default_currency' => 'EUR'],
            ['code' => 'IL', 'name' => 'Israel', 'default_language' => 'he', 'default_currency' => 'ILS'],
            ['code' => 'IT', 'name' => 'Italy', 'default_language' => 'it', 'default_currency' => 'EUR'],
            ['code' => 'JM', 'name' => 'Jamaica', 'default_language' => 'en', 'default_currency' => 'JMD'],
            ['code' => 'JP', 'name' => 'Japan', 'default_language' => 'ja', 'default_currency' => 'JPY'],
            ['code' => 'JO', 'name' => 'Jordan', 'default_language' => 'ar', 'default_currency' => 'JOD'],
            ['code' => 'KZ', 'name' => 'Kazakhstan', 'default_language' => 'kk', 'default_currency' => 'KZT'],
            ['code' => 'KE', 'name' => 'Kenya', 'default_language' => 'en', 'default_currency' => 'KES'],
            ['code' => 'KI', 'name' => 'Kiribati', 'default_language' => 'en', 'default_currency' => 'AUD'],
            ['code' => 'KW', 'name' => 'Kuwait', 'default_language' => 'ar', 'default_currency' => 'KWD'],
            ['code' => 'KG', 'name' => 'Kyrgyzstan', 'default_language' => 'ky', 'default_currency' => 'KGS'],
            ['code' => 'LA', 'name' => 'Laos', 'default_language' => 'lo', 'default_currency' => 'LAK'],
            ['code' => 'LV', 'name' => 'Latvia', 'default_language' => 'lv', 'default_currency' => 'EUR'],
            ['code' => 'LB', 'name' => 'Lebanon', 'default_language' => 'ar', 'default_currency' => 'LBP'],
            ['code' => 'LS', 'name' => 'Lesotho', 'default_language' => 'en', 'default_currency' => 'LSL'],
            ['code' => 'LR', 'name' => 'Liberia', 'default_language' => 'en', 'default_currency' => 'LRD'],
            ['code' => 'LY', 'name' => 'Libya', 'default_language' => 'ar', 'default_currency' => 'LYD'],
            ['code' => 'LI', 'name' => 'Liechtenstein', 'default_language' => 'de', 'default_currency' => 'CHF'],
            ['code' => 'LT', 'name' => 'Lithuania', 'default_language' => 'lt', 'default_currency' => 'EUR'],
            ['code' => 'LU', 'name' => 'Luxembourg', 'default_language' => 'fr', 'default_currency' => 'EUR'],
            ['code' => 'MG', 'name' => 'Madagascar', 'default_language' => 'mg', 'default_currency' => 'MGA'],
            ['code' => 'MW', 'name' => 'Malawi', 'default_language' => 'en', 'default_currency' => 'MWK'],
            ['code' => 'MY', 'name' => 'Malaysia', 'default_language' => 'ms', 'default_currency' => 'MYR'],
            ['code' => 'MV', 'name' => 'Maldives', 'default_language' => 'dv', 'default_currency' => 'MVR'],
            ['code' => 'ML', 'name' => 'Mali', 'default_language' => 'fr', 'default_currency' => 'XOF'],
            ['code' => 'MT', 'name' => 'Malta', 'default_language' => 'mt', 'default_currency' => 'EUR'],
            ['code' => 'MH', 'name' => 'Marshall Islands', 'default_language' => 'en', 'default_currency' => 'USD'],
            ['code' => 'MR', 'name' => 'Mauritania', 'default_language' => 'ar', 'default_currency' => 'MRU'],
            ['code' => 'MU', 'name' => 'Mauritius', 'default_language' => 'en', 'default_currency' => 'MUR'],
            ['code' => 'MX', 'name' => 'Mexico', 'default_language' => 'es', 'default_currency' => 'MXN'],
            ['code' => 'FM', 'name' => 'Micronesia', 'default_language' => 'en', 'default_currency' => 'USD'],
            ['code' => 'MD', 'name' => 'Moldova', 'default_language' => 'ro', 'default_currency' => 'MDL'],
            ['code' => 'MC', 'name' => 'Monaco', 'default_language' => 'fr', 'default_currency' => 'EUR'],
            ['code' => 'MN', 'name' => 'Mongolia', 'default_language' => 'mn', 'default_currency' => 'MNT'],
            ['code' => 'ME', 'name' => 'Montenegro', 'default_language' => 'sr', 'default_currency' => 'EUR'],
            ['code' => 'MA', 'name' => 'Morocco', 'default_language' => 'ar', 'default_currency' => 'MAD'],
            ['code' => 'MZ', 'name' => 'Mozambique', 'default_language' => 'pt', 'default_currency' => 'MZN'],
            ['code' => 'MM', 'name' => 'Myanmar', 'default_language' => 'my', 'default_currency' => 'MMK'],
            ['code' => 'NA', 'name' => 'Namibia', 'default_language' => 'en', 'default_currency' => 'NAD'],
            ['code' => 'NR', 'name' => 'Nauru', 'default_language' => 'en', 'default_currency' => 'AUD'],
            ['code' => 'NP', 'name' => 'Nepal', 'default_language' => 'ne', 'default_currency' => 'NPR'],
            ['code' => 'NL', 'name' => 'Netherlands', 'default_language' => 'nl', 'default_currency' => 'EUR'],
            ['code' => 'NZ', 'name' => 'New Zealand', 'default_language' => 'en', 'default_currency' => 'NZD'],
            ['code' => 'NI', 'name' => 'Nicaragua', 'default_language' => 'es', 'default_currency' => 'NIO'],
            ['code' => 'NE', 'name' => 'Niger', 'default_language' => 'fr', 'default_currency' => 'XOF'],
            ['code' => 'NG', 'name' => 'Nigeria', 'default_language' => 'en', 'default_currency' => 'NGN'],
            ['code' => 'NO', 'name' => 'Norway', 'default_language' => 'no', 'default_currency' => 'NOK'],
            ['code' => 'OM', 'name' => 'Oman', 'default_language' => 'ar', 'default_currency' => 'OMR'],
            ['code' => 'PK', 'name' => 'Pakistan', 'default_language' => 'ur', 'default_currency' => 'PKR'],
            ['code' => 'PW', 'name' => 'Palau', 'default_language' => 'en', 'default_currency' => 'USD'],
            ['code' => 'PS', 'name' => 'Palestine', 'default_language' => 'ar', 'default_currency' => 'ILS'],
            ['code' => 'PA', 'name' => 'Panama', 'default_language' => 'es', 'default_currency' => 'PAB'],
            ['code' => 'PG', 'name' => 'Papua New Guinea', 'default_language' => 'en', 'default_currency' => 'PGK'],
            ['code' => 'PY', 'name' => 'Paraguay', 'default_language' => 'es', 'default_currency' => 'PYG'],
            ['code' => 'PE', 'name' => 'Peru', 'default_language' => 'es', 'default_currency' => 'PEN'],
            ['code' => 'PH', 'name' => 'Philippines', 'default_language' => 'en', 'default_currency' => 'PHP'],
            ['code' => 'PL', 'name' => 'Poland', 'default_language' => 'pl', 'default_currency' => 'PLN'],
            ['code' => 'PT', 'name' => 'Portugal', 'default_language' => 'pt', 'default_currency' => 'EUR'],
            ['code' => 'QA', 'name' => 'Qatar', 'default_language' => 'ar', 'default_currency' => 'QAR'],
            ['code' => 'RO', 'name' => 'Romania', 'default_language' => 'ro', 'default_currency' => 'RON'],
            ['code' => 'RU', 'name' => 'Russia', 'default_language' => 'ru', 'default_currency' => 'RUB'],
            ['code' => 'RW', 'name' => 'Rwanda', 'default_language' => 'en', 'default_currency' => 'RWF'],
            ['code' => 'KN', 'name' => 'Saint Kitts and Nevis', 'default_language' => 'en', 'default_currency' => 'XCD'],
            ['code' => 'LC', 'name' => 'Saint Lucia', 'default_language' => 'en', 'default_currency' => 'XCD'],
            ['code' => 'VC', 'name' => 'Saint Vincent and the Grenadines', 'default_language' => 'en', 'default_currency' => 'XCD'],
            ['code' => 'WS', 'name' => 'Samoa', 'default_language' => 'en', 'default_currency' => 'WST'],
            ['code' => 'SM', 'name' => 'San Marino', 'default_language' => 'it', 'default_currency' => 'EUR'],
            ['code' => 'ST', 'name' => 'Sao Tome and Principe', 'default_language' => 'pt', 'default_currency' => 'STN'],
            ['code' => 'SA', 'name' => 'Saudi Arabia', 'default_language' => 'ar', 'default_currency' => 'SAR'],
            ['code' => 'SN', 'name' => 'Senegal', 'default_language' => 'fr', 'default_currency' => 'XOF'],
            ['code' => 'RS', 'name' => 'Serbia', 'default_language' => 'sr', 'default_currency' => 'RSD'],
            ['code' => 'SC', 'name' => 'Seychelles', 'default_language' => 'en', 'default_currency' => 'SCR'],
            ['code' => 'SL', 'name' => 'Sierra Leone', 'default_language' => 'en', 'default_currency' => 'SLL'],
            ['code' => 'SG', 'name' => 'Singapore', 'default_language' => 'en', 'default_currency' => 'SGD'],
            ['code' => 'SK', 'name' => 'Slovakia', 'default_language' => 'sk', 'default_currency' => 'EUR'],
            ['code' => 'SI', 'name' => 'Slovenia', 'default_language' => 'sl', 'default_currency' => 'EUR'],
            ['code' => 'SB', 'name' => 'Solomon Islands', 'default_language' => 'en', 'default_currency' => 'SBD'],
            ['code' => 'SO', 'name' => 'Somalia', 'default_language' => 'so', 'default_currency' => 'SOS'],
            ['code' => 'ZA', 'name' => 'South Africa', 'default_language' => 'en', 'default_currency' => 'ZAR'],
            ['code' => 'KR', 'name' => 'South Korea', 'default_language' => 'ko', 'default_currency' => 'KRW'],
            ['code' => 'SS', 'name' => 'South Sudan', 'default_language' => 'en', 'default_currency' => 'SSP'],
            ['code' => 'ES', 'name' => 'Spain', 'default_language' => 'es', 'default_currency' => 'EUR'],
            ['code' => 'LK', 'name' => 'Sri Lanka', 'default_language' => 'si', 'default_currency' => 'LKR'],
            ['code' => 'SD', 'name' => 'Sudan', 'default_language' => 'ar', 'default_currency' => 'SDG'],
            ['code' => 'SR', 'name' => 'Suriname', 'default_language' => 'nl', 'default_currency' => 'SRD'],
            ['code' => 'SE', 'name' => 'Sweden', 'default_language' => 'sv', 'default_currency' => 'SEK'],
            ['code' => 'CH', 'name' => 'Switzerland', 'default_language' => 'de', 'default_currency' => 'CHF'],
            ['code' => 'SY', 'name' => 'Syria', 'default_language' => 'ar', 'default_currency' => 'SYP'],
            ['code' => 'TW', 'name' => 'Taiwan', 'default_language' => 'zh', 'default_currency' => 'TWD'],
            ['code' => 'TJ', 'name' => 'Tajikistan', 'default_language' => 'tg', 'default_currency' => 'TJS'],
            ['code' => 'TZ', 'name' => 'Tanzania', 'default_language' => 'sw', 'default_currency' => 'TZS'],
            ['code' => 'TH', 'name' => 'Thailand', 'default_language' => 'th', 'default_currency' => 'THB'],
            ['code' => 'TL', 'name' => 'Timor-Leste', 'default_language' => 'pt', 'default_currency' => 'USD'],
            ['code' => 'TG', 'name' => 'Togo', 'default_language' => 'fr', 'default_currency' => 'XOF'],
            ['code' => 'TO', 'name' => 'Tonga', 'default_language' => 'en', 'default_currency' => 'TOP'],
            ['code' => 'TT', 'name' => 'Trinidad and Tobago', 'default_language' => 'en', 'default_currency' => 'TTD'],
            ['code' => 'TN', 'name' => 'Tunisia', 'default_language' => 'ar', 'default_currency' => 'TND'],
            ['code' => 'TR', 'name' => 'Turkey', 'default_language' => 'tr', 'default_currency' => 'TRY'],
            ['code' => 'TM', 'name' => 'Turkmenistan', 'default_language' => 'tk', 'default_currency' => 'TMT'],
            ['code' => 'TV', 'name' => 'Tuvalu', 'default_language' => 'en', 'default_currency' => 'AUD'],
            ['code' => 'UG', 'name' => 'Uganda', 'default_language' => 'en', 'default_currency' => 'UGX'],
            ['code' => 'UA', 'name' => 'Ukraine', 'default_language' => 'uk', 'default_currency' => 'UAH'],
            ['code' => 'AE', 'name' => 'United Arab Emirates', 'default_language' => 'ar', 'default_currency' => 'AED'],
            ['code' => 'GB', 'name' => 'United Kingdom', 'default_language' => 'en', 'default_currency' => 'GBP'],
            ['code' => 'US', 'name' => 'United States', 'default_language' => 'en', 'default_currency' => 'USD'],
            ['code' => 'UY', 'name' => 'Uruguay', 'default_language' => 'es', 'default_currency' => 'UYU'],
            ['code' => 'UZ', 'name' => 'Uzbekistan', 'default_language' => 'uz', 'default_currency' => 'UZS'],
            ['code' => 'VU', 'name' => 'Vanuatu', 'default_language' => 'en', 'default_currency' => 'VUV'],
            ['code' => 'VE', 'name' => 'Venezuela', 'default_language' => 'es', 'default_currency' => 'VES'],
            ['code' => 'VN', 'name' => 'Vietnam', 'default_language' => 'vi', 'default_currency' => 'VND'],
            ['code' => 'YE', 'name' => 'Yemen', 'default_language' => 'ar', 'default_currency' => 'YER'],
            ['code' => 'ZM', 'name' => 'Zambia', 'default_language' => 'en', 'default_currency' => 'ZMW'],
            ['code' => 'ZW', 'name' => 'Zimbabwe', 'default_language' => 'en', 'default_currency' => 'ZWL'],
        ];

        Schema::table('countries', function (Blueprint $table) {
            $table->string('default_language', 10)->nullable()->default('en');
            $table->string('default_currency', 10)->nullable()->default('EUR');
        });

        foreach ($countryData as $country) {
            $countryModel = Country::where('code', $country['code'])->first();

            if(is_null($countryModel)) {
                $countryModel = new Country();
                $countryModel->code = $country['code'];
            }

            $countryModel->default_language = $country['default_language'];
            $countryModel->default_currency = $country['default_currency'];

            $countryModel->save();
        }
    }

    public function down()
    {
        Schema::table('countries', function (Blueprint $table) {
            $table->dropColumn(['default_language', 'default_currency']);
        });
    }
};
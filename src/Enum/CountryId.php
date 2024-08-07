<?php /** @noinspection SpellCheckingInspection */

namespace Sovic\Common\Enum;

enum CountryId: string implements SimpleTranslatableEnumInterface
{
    case AF = 'AF'; // Afghanistan
    case AX = 'AX'; // Åland Islands
    case AL = 'AL'; // Albania
    case DZ = 'DZ'; // Algeria
    case AS = 'AS'; // American Samoa
    case AD = 'AD'; // Andorra
    case AO = 'AO'; // Angola
    case AI = 'AI'; // Anguilla
    case AQ = 'AQ'; // Antarctica
    case AG = 'AG'; // Antigua and Barbuda
    case AR = 'AR'; // Argentina
    case AM = 'AM'; // Armenia
    case AW = 'AW'; // Aruba
    case AU = 'AU'; // Australia
    case AT = 'AT'; // Austria
    case AZ = 'AZ'; // Azerbaijan
    case BS = 'BS'; // Bahamas
    case BH = 'BH'; // Bahrain
    case BD = 'BD'; // Bangladesh
    case BB = 'BB'; // Barbados
    case BY = 'BY'; // Belarus
    case BE = 'BE'; // Belgium
    case BZ = 'BZ'; // Belize
    case BJ = 'BJ'; // Benin
    case BM = 'BM'; // Bermuda
    case BT = 'BT'; // Bhutan
    case BO = 'BO'; // Bolivia
    case BQ = 'BQ'; // Bonaire, Sint Eustatius and Saba
    case BA = 'BA'; // Bosnia and Herzegovina
    case BW = 'BW'; // Botswana
    case BV = 'BV'; // Bouvet Island
    case BR = 'BR'; // Brazil
    case IO = 'IO'; // British Indian Ocean Territory
    case BN = 'BN'; // Brunei Darussalam
    case BG = 'BG'; // Bulgaria
    case BF = 'BF'; // Burkina Faso
    case BI = 'BI'; // Burundi
    case KH = 'KH'; // Cambodia
    case CM = 'CM'; // Cameroon
    case CA = 'CA'; // Canada
    case CV = 'CV'; // Cape Verde
    case KY = 'KY'; // Cayman Islands
    case CF = 'CF'; // Central African Republic
    case TD = 'TD'; // Chad
    case CL = 'CL'; // Chile
    case CN = 'CN'; // China
    case CX = 'CX'; // Christmas Island
    case CC = 'CC'; // Cocos (Keeling) Islands
    case CO = 'CO'; // Colombia
    case KM = 'KM'; // Comoros
    case CG = 'CG'; // Republic of the (Brazzaville) Congo
    case CD = 'CD'; // The Democratic Republic of the (Kinshasa) Congo
    case CK = 'CK'; // Cook Islands
    case CR = 'CR'; // Costa Rica
    case CI = 'CI'; // Republic of Côte d'Ivoire
    case HR = 'HR'; // Croatia
    case CU = 'CU'; // Cuba
    case CW = 'CW'; // Curaçao
    case CY = 'CY'; // Cyprus
    case CZ = 'CZ'; // Czech Republic
    case DK = 'DK'; // Denmark
    case DJ = 'DJ'; // Djibouti
    case DM = 'DM'; // Dominica
    case DO = 'DO'; // Dominican Republic
    case EC = 'EC'; // Ecuador
    case EG = 'EG'; // Egypt
    case SV = 'SV'; // El Salvador
    case GQ = 'GQ'; // Equatorial Guinea
    case ER = 'ER'; // Eritrea
    case EE = 'EE'; // Estonia
    case ET = 'ET'; // Ethiopia
    case FK = 'FK'; // Falkland Islands (Islas Malvinas)
    case FO = 'FO'; // Faroe Islands
    case FJ = 'FJ'; // Fiji
    case FI = 'FI'; // Finland
    case FR = 'FR'; // France
    case GF = 'GF'; // French Guiana
    case PF = 'PF'; // French Polynesia
    case TF = 'TF'; // French Southern and Antarctic Lands
    case GA = 'GA'; // Gabon
    case GM = 'GM'; // The Gambia
    case GE = 'GE'; // Georgia
    case DE = 'DE'; // Germany
    case GH = 'GH'; // Ghana
    case GI = 'GI'; // Gibraltar
    case GR = 'GR'; // Greece
    case GL = 'GL'; // Greenland
    case GD = 'GD'; // Grenada
    case GP = 'GP'; // Guadeloupe
    case GU = 'GU'; // Guam
    case GT = 'GT'; // Guatemala
    case GG = 'GG'; // Guernsey
    case GN = 'GN'; // Guinea
    case GW = 'GW'; // Guinea-Bissau
    case GY = 'GY'; // Guyana
    case HT = 'HT'; // Haiti
    case HM = 'HM'; // Heard Island and McDonald Islands
    case VA = 'VA'; // Holy See (Vatican City)
    case HN = 'HN'; // Honduras
    case HK = 'HK'; // Hong Kong
    case HU = 'HU'; // Hungary
    case IS = 'IS'; // Iceland
    case IN = 'IN'; // India
    case ID = 'ID'; // Indonesia
    case IR = 'IR'; // Islamic Republic of Iran
    case IQ = 'IQ'; // Iraq
    case IE = 'IE'; // Ireland
    case IM = 'IM'; // Isle of Man
    case IL = 'IL'; // Israel
    case IT = 'IT'; // Italy
    case JM = 'JM'; // Jamaica
    case JP = 'JP'; // Japan
    case JE = 'JE'; // Jersey
    case JO = 'JO'; // Jordan
    case KZ = 'KZ'; // Kazakhstan
    case KE = 'KE'; // Kenya
    case KI = 'KI'; // Kiribati
    case KP = 'KP'; // Democratic People's Republic of Korea
    case KR = 'KR'; // Republic of Korea
    case XK = 'XK'; // Kosovo
    case KW = 'KW'; // Kuwait
    case KG = 'KG'; // Kyrgyzstan
    case LA = 'LA'; // Laos
    case LV = 'LV'; // Latvia
    case LB = 'LB'; // Lebanon
    case LS = 'LS'; // Lesotho
    case LR = 'LR'; // Liberia
    case LY = 'LY'; // Libya
    case LI = 'LI'; // Liechtenstein
    case LT = 'LT'; // Lithuania
    case LU = 'LU'; // Luxembourg
    case MO = 'MO'; // Macao
    case MK = 'MK'; // Republic of Macedonia
    case MG = 'MG'; // Madagascar
    case MW = 'MW'; // Malawi
    case MY = 'MY'; // Malaysia
    case MV = 'MV'; // Maldives
    case ML = 'ML'; // Mali
    case MT = 'MT'; // Malta
    case MH = 'MH'; // Marshall Islands
    case MQ = 'MQ'; // Martinique
    case MR = 'MR'; // Mauritania
    case MU = 'MU'; // Mauritius
    case YT = 'YT'; // Mayotte
    case MX = 'MX'; // Mexico
    case FM = 'FM'; // Federated States of Micronesia
    case MD = 'MD'; // Moldova
    case MC = 'MC'; // Monaco
    case MN = 'MN'; // Mongolia
    case ME = 'ME'; // Montenegro
    case MS = 'MS'; // Montserrat
    case MA = 'MA'; // Morocco
    case MZ = 'MZ'; // Mozambique
    case MM = 'MM'; // Myanmar
    case NA = 'NA'; // Namibia
    case NR = 'NR'; // Nauru
    case NP = 'NP'; // Nepal
    case NL = 'NL'; // Netherlands
    case NC = 'NC'; // New Caledonia
    case NZ = 'NZ'; // New Zealand
    case NI = 'NI'; // Nicaragua
    case NE = 'NE'; // Niger
    case NG = 'NG'; // Nigeria
    case NU = 'NU'; // Niue
    case NF = 'NF'; // Norfolk Island
    case MP = 'MP'; // Northern Mariana Islands
    case NO = 'NO'; // Norway
    case OM = 'OM'; // Oman
    case PK = 'PK'; // Pakistan
    case PW = 'PW'; // Palau
    case PS = 'PS'; // State of Palestine
    case PA = 'PA'; // Panama
    case PG = 'PG'; // Papua New Guinea
    case PY = 'PY'; // Paraguay
    case PE = 'PE'; // Peru
    case PH = 'PH'; // Philippines
    case PN = 'PN'; // Pitcairn
    case PL = 'PL'; // Poland
    case PT = 'PT'; // Portugal
    case PR = 'PR'; // Puerto Rico
    case QA = 'QA'; // Qatar
    case RE = 'RE'; // Réunion
    case RO = 'RO'; // Romania
    case RU = 'RU'; // Russian Federation
    case RW = 'RW'; // Rwanda
    case BL = 'BL'; // Saint Barthélemy
    case SH = 'SH'; // Saint Helena, Ascension and Tristan da Cunha
    case KN = 'KN'; // Saint Kitts and Nevis
    case LC = 'LC'; // Saint Lucia
    case MF = 'MF'; // Saint Martin
    case PM = 'PM'; // Saint Pierre and Miquelon
    case VC = 'VC'; // Saint Vincent and the Grenadines
    case WS = 'WS'; // Samoa
    case SM = 'SM'; // San Marino
    case ST = 'ST'; // Sao Tome and Principe
    case SA = 'SA'; // Saudi Arabia
    case SN = 'SN'; // Senegal
    case RS = 'RS'; // Serbia
    case SC = 'SC'; // Seychelles
    case SL = 'SL'; // Sierra Leone
    case SG = 'SG'; // Singapore
    case SX = 'SX'; // Sint Maarten (Dutch part)
    case SK = 'SK'; // Slovakia
    case SI = 'SI'; // Slovenia
    case SB = 'SB'; // Solomon Islands
    case SO = 'SO'; // Somalia
    case ZA = 'ZA'; // South Africa
    case GS = 'GS'; // South Georgia and South Sandwich Islands
    case SS = 'SS'; // South Sudan
    case ES = 'ES'; // Spain
    case LK = 'LK'; // Sri Lanka
    case SD = 'SD'; // Sudan
    case SR = 'SR'; // Suriname
    case SZ = 'SZ'; // Eswatini
    case SE = 'SE'; // Sweden
    case CH = 'CH'; // Switzerland
    case SY = 'SY'; // Syrian Arab Republic
    case TW = 'TW'; // Taiwan
    case TJ = 'TJ'; // Tajikistan
    case TZ = 'TZ'; // United Republic of Tanzania
    case TH = 'TH'; // Thailand
    case TL = 'TL'; // Timor-Leste
    case TG = 'TG'; // Togo
    case TK = 'TK'; // Tokelau
    case TO = 'TO'; // Tonga
    case TT = 'TT'; // Trinidad and Tobago
    case TN = 'TN'; // Tunisia
    case TR = 'TR'; // Turkey
    case TM = 'TM'; // Turkmenistan
    case TC = 'TC'; // Turks and Caicos Islands
    case TV = 'TV'; // Tuvalu
    case UG = 'UG'; // Uganda
    case UA = 'UA'; // Ukraine
    case AE = 'AE'; // United Arab Emirates
    case GB = 'GB'; // United Kingdom
    case US = 'US'; // United States
    case UM = 'UM'; // United States Minor Outlying Islands
    case UY = 'UY'; // Uruguay
    case UZ = 'UZ'; // Uzbekistan
    case VU = 'VU'; // Vanuatu
    case VE = 'VE'; // Bolivarian Republic of Venezuela
    case VN = 'VN'; // Vietnam
    case VG = 'VG'; // Virgin Islands, British
    case VI = 'VI'; // Virgin Islands, U.S.
    case WF = 'WF'; // Wallis and Futuna
    case EH = 'EH'; // Western Sahara
    case YE = 'YE'; // Yemen
    case ZM = 'ZM'; // Zambia
    case ZW = 'ZW'; // Zimbabwe

    public function getSelectCountries(): array
    {
        return [
            'CZ' => 'Česká republika',
            'SK' => 'Slovensko',
            'PL' => 'Polsko',
            'DE' => 'Německo',
            'AT' => 'Rakousko',
            'HU' => 'Maďarsko',
        ];
    }

    public function trans(): string
    {
        return match ($this) {
            self::CZ => 'Česká republika',
            self::SK => 'Slovensko',
            self::PL => 'Polsko',
            self::DE => 'Německo',
            self::AT => 'Rakousko',
            self::HU => 'Maďarsko',
            //
            self::AF => 'Afghánistán',
            self::AX => 'Ålandy',
            self::AL => 'Albánie',
            self::DZ => 'Alžírsko',
            self::AS => 'Americká Samoa',
            self::AD => 'Andorra',
            self::AO => 'Angola',
            self::AI => 'Anguilla',
            self::AQ => 'Antarktida',
            self::AG => 'Antigua a Barbuda',
            self::AR => 'Argentina',
            self::AM => 'Arménie',
            self::AW => 'Aruba',
            self::AU => 'Austrálie',
            self::AZ => 'Ázerbájdžán',
            self::BS => 'Bahamy',
            self::BH => 'Bahrajn',
            self::BD => 'Bangladéš',
            self::BB => 'Barbados',
            self::BY => 'Bělorusko',
            self::BE => 'Belgie',
            self::BZ => 'Belize',
            self::BJ => 'Benin',
            self::BM => 'Bermudy',
            self::BT => 'Bhútán',
            self::BO => 'Bolívie',
            self::BQ => 'Bonaire, Svatý Eustach a Saba',
            self::BA => 'Bosna a Hercegovina',
            self::BW => 'Botswana',
            self::BV => 'Bouvetův ostrov',
            self::BR => 'Brazílie',
            self::IO => 'Britské indickooceánské území',
            self::BN => 'Brunej',
            self::BG => 'Bulharsko',
            self::BF => 'Burkina Faso',
            self::BI => 'Burundi',
            self::KH => 'Kambodža',
            self::CM => 'Kamerun',
            self::CA => 'Kanada',
            self::CV => 'Kapverdy',
            self::KY => 'Kajmanské ostrovy',
            self::CF => 'Středoafrická republika',
            self::TD => 'Čad',
            self::CL => 'Chile',
            self::CN => 'Čína',
            self::CX => 'Vánoční ostrov',
            self::CC => 'Kokosové ostrovy',
            self::CO => 'Kolumbie',
            self::KM => 'Komory',
            self::CG,
            self::CD => 'Kongo',
            self::CK => 'Cookovy ostrovy',
            self::CR => 'Kostarika',
            self::CI => 'Pobřeží slonoviny',
            self::HR => 'Chorvatsko',
            self::CU => 'Kuba',
            self::CW => 'Curaçao',
            self::CY => 'Kypr',
            self::DK => 'Dánsko',
            self::DJ => 'Džibutsko',
            self::DM => 'Dominika',
            self::DO => 'Dominikánská republika',
            self::EC => 'Ekvádor',
            self::EG => 'Egypt',
            self::SV => 'Salvador',
            self::GQ => 'Rovníková Guinea',
            self::ER => 'Eritrea',
            self::EE => 'Estonsko',
            self::ET => 'Etiopie',
            self::FK => 'Falklandy',
            self::FO => 'Faerské ostrovy',
            self::FJ => 'Fidži',
            self::FI => 'Finsko',
            self::FR => 'Francie',
            self::GF => 'Francouzská Guyana',
            self::PF => 'Francouzská Polynésie',
            self::TF => 'Francouzská jižní a antarktická území',
            self::GA => 'Gabon',
            self::GM => 'Gambie',
            self::GE => 'Gruzie',
            self::GH => 'Ghana',
            self::GI => 'Gibraltar',
            self::GR => 'Řecko',
            self::GL => 'Grónsko',
            self::GD => 'Grenada',
            self::GP => 'Guadeloupe',
            self::GU => 'Guam',
            self::GT => 'Guatemala',
            self::GG => 'Guernsey',
            self::GN => 'Guinea',
            self::GW => 'Guinea-Bissau',
            self::GY => 'Guyana',
            self::HT => 'Haiti',
            self::HM => 'Heardův ostrov a McDonaldovy ostrovy',
            self::VA => 'Svatý stolec',
            self::HN => 'Honduras',
            self::HK => 'Hongkong',
            self::IS => 'Island',
            self::IN => 'Indie',
            self::ID => 'Indonésie',
            self::IR => 'Írán',
            self::IQ => 'Irák',
            self::IE => 'Irsko',
            self::IM => 'Isle of Man',
            self::IL => 'Izrael',
            self::IT => 'Itálie',
            self::JM => 'Jamajka',
            self::JP => 'Japonsko',
            self::JE => 'Jersey',
            self::JO => 'Jordánsko',
            self::KZ => 'Kazachstán',
            self::KE => 'Keňa',
            self::KI => 'Kiribati',
            self::KP => 'Severní Korea',
            self::KR => 'Jižní Korea',
            self::XK => 'Kosovo',
            self::KW => 'Kuvajt',
            self::KG => 'Kyrgyzstán',
            self::LA => 'Laos',
            self::LV => 'Lotyšsko',
            self::LB => 'Libanon',
            self::LS => 'Lesotho',
            self::LR => 'Libérie',
            self::LY => 'Libye',
            self::LI => 'Lichtenštejnsko',
            self::LT => 'Litva',
            self::LU => 'Lucembursko',
            self::MO => 'Macao',
            self::MK => 'Makedonie',
            self::MG => 'Madagaskar',
            self::MW => 'Malawi',
            self::MY => 'Malajsie',
            self::MV => 'Maledivy',
            self::ML => 'Mali',
            self::MT => 'Malta',
            self::MH => 'Marshallovy ostrovy',
            self::MQ => 'Martinik',
            self::MR => 'Mauritánie',
            self::MU => 'Mauricius',
            self::YT => 'Mayotte',
            self::MX => 'Mexiko',
            self::FM => 'Mikronésie',
            self::MD => 'Moldavsko',
            self::MC => 'Monako',
            self::MN => 'Mongolsko',
            self::ME => 'Černá Hora',
            self::MS => 'Montserrat',
            self::MA => 'Maroko',
            self::MZ => 'Mosambik',
            self::MM => 'Myanmar',
            self::NA => 'Namibie',
            self::NR => 'Nauru',
            self::NP => 'Nepál',
            self::NL => 'Nizozemsko',
            self::NC => 'Nová Kaledonie',
            self::NZ => 'Nový Zéland',
            self::NI => 'Nikaragua',
            self::NE => 'Niger',
            self::NG => 'Nigérie',
            self::NU => 'Niue',
            self::NF => 'Norfolk',
            self::MP => 'Severní Mariany',
            self::NO => 'Norsko',
            self::OM => 'Omán',
            self::PK => 'Pákistán',
            self::PW => 'Palau',
            self::PS => 'Palestina',
            self::PA => 'Panama',
            self::PG => 'Papua Nová Guinea',
            self::PY => 'Paraguay',
            self::PE => 'Peru',
            self::PH => 'Filipíny',
            self::PN => 'Pitcairn',
            self::PT => 'Portugalsko',
            self::PR => 'Portoriko',
            self::QA => 'Katar',
            self::RE => 'Réunion',
            self::RO => 'Rumunsko',
            self::RU => 'Rusko',
            self::RW => 'Rwanda',
            self::BL => 'Svatý Bartoloměj',
            self::SH => 'Svatá Helena',
            self::KN => 'Svatý Kryštof a Nevis',
            self::LC => 'Svatá Lucie',
            self::MF,
            self::SX => 'Svatý Martin',
            self::PM => 'Saint Pierre a Miquelon',
            self::VC => 'Svatý Vincenc a Grenadiny',
            self::WS => 'Samoa',
            self::SM => 'San Marino',
            self::ST => 'Svatý Tomáš a Princův ostrov',
            self::SA => 'Saúdská Arábie',
            self::SN => 'Senegal',
            self::RS => 'Srbsko',
            self::SC => 'Seychely',
            self::SL => 'Sierra Leone',
            self::SG => 'Singapur',
            self::SI => 'Slovinsko',
            self::SB => 'Šalamounovy ostrovy',
            self::SO => 'Somálsko',
            self::ZA => 'Jihoafrická republika',
            self::GS => 'Jižní Georgie a Jižní Sandwichovy ostrovy',
            self::SS => 'Jižní Súdán',
            self::ES => 'Španělsko',
            self::LK => 'Srí Lanka',
            self::SD => 'Súdán',
            self::SR => 'Surinam',
            self::SZ => 'Svazijsko',
            self::SE => 'Švédsko',
            self::CH => 'Švýcarsko',
            self::SY => 'Sýrie',
            self::TW => 'Tchaj-wan',
            self::TJ => 'Tádžikistán',
            self::TZ => 'Tanzanie',
            self::TH => 'Thajsko',
            self::TL => 'Východní Timor',
            self::TG => 'Togo',
            self::TK => 'Tokelau',
            self::TO => 'Tonga',
            self::TT => 'Trinidad a Tobago',
            self::TN => 'Tunisko',
            self::TR => 'Turecko',
            self::TM => 'Turkmenistán',
            self::TC => 'Turks a Caicos',
            self::TV => 'Tuvalu',
            self::UG => 'Uganda',
            self::UA => 'Ukrajina',
            self::AE => 'Spojené arabské emiráty',
            self::GB => 'Spojené království',
            self::US => 'Spojené státy',
            self::UM => 'Menší odlehlé ostrovy USA',
            self::UY => 'Uruguay',
            self::UZ => 'Uzbekistán',
            self::VU => 'Vanuatu',
            self::VE => 'Venezuela',
            self::VN => 'Vietnam',
            self::VG => 'Britské Panenské ostrovy',
            self::VI => 'Americké Panenské ostrovy',
            self::WF => 'Wallis a Futuna',
            self::EH => 'Západní Sahara',
            self::YE => 'Jemen',
            self::ZM => 'Zambie',
            self::ZW => 'Zimbabwe',
        };
    }

    public static function tryFromName(string $name): ?CountryId
    {
        $name = trim($name);

        return match ($name) {
            //
            'ČR',
            'Česká republika',
            'Česko' => self::CZ,
            //
            'SK',
            'SR',
            'Slovenská republika',
            'Slovensko' => self::SK,
            //
            'D',
            'Deutschland',
            'NSR',
            'Německá spolková republika',
            'Spolková republika Německo',
            'SRN',
            'Německo' => self::DE,
            //
            'Switzerland',
            'Švýcarsko' => self::CH,
            //
            'Maďarsko' => self::HU,
            'Irsko' => self::IE,
            'Itálie' => self::IT,
            'Polsko' => self::PL,
            'Rakousko' => self::AT,
            'Španělsko' => self::ES,
            'Švédsko' => self::SE,
            'Ukrajina' => self::UA,
            'Velká Británie' => self::GB,
            'USA' => self::US,
            default => null,
        };
    }
}

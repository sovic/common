<?php

namespace Sovic\Common\Controller\Trait;

use libphonenumber\PhoneNumberUtil;
use Sovic\Common\Entity\AddressEntityInterface;
use Sovic\Common\Entity\ContactItemInterface;
use Sovic\Common\Enum\ContactTypeId;
use Sovic\Common\Validator\EmailValidator;
use Sovic\Common\Validator\PhoneConstraint;
use Symfony\Component\Validator\Constraints\Url;
use Symfony\Component\Validator\Validation;

trait ValidationTrait
{
    // This method is used to validate the contact item.
    // AddressEntityInterface is used to better parse contact items based on national customs.
    public function validateContactItem(ContactItemInterface $contact, ?AddressEntityInterface $address = null): array
    {
        $errors = [];
        if (($contact->getTypeId() === ContactTypeId::Email)
            && EmailValidator::validate($contact->getValue()) !== true) {
            $errors[] = 'Neplatný e-mail';
        }

        if ($contact->getTypeId() === ContactTypeId::Phone) {
            $value = [
                'phone' => $contact->getValue(),
                'country' => 'CZ',
            ];
            if ($address) {
                $value['country'] = $address->getCountry()->value;
            }

            $validator = Validation::createValidator();
            $violations = $validator->validate($value, new PhoneConstraint());
            if (0 === count($violations)) {
                // no violations, try to parse and normalize the phone number before saving
                $phoneUtil = PhoneNumberUtil::getInstance();
                // ignore exception here, the phone is already validated by constraint
                /** @noinspection PhpUnhandledExceptionInspection */
                $phoneNumber = $phoneUtil->parse($value['phone'], $value['country']);
                if ($phoneNumber) {
                    $countryCode = $phoneNumber->getCountryCode();
                    $contact->setValue(($countryCode ? '+' . $countryCode : '') . $phoneNumber->getNationalNumber());
                }
            } else {
                $errors[] = 'Neplatné telefonní číslo';
            }
        }

        if ($contact->getTypeId() === ContactTypeId::Web) {
            if (str_starts_with($contact->getValue(), 'www.')) {
                $contact->setValue('https://' . $contact->getValue());
            }
            $validator = Validation::createValidator();
            $violations = $validator->validate($contact->getValue(), new Url());
            if (0 !== count($violations)) {
                $errors[] = 'Neplatná URL';
            }
            /** @noinspection HttpUrlsUsage */
            if (str_starts_with($contact->getValue(), 'http://')) {
                $errors[] = 'HTTP protokol již není povolen';
            }
        }

        return $errors;
    }
}

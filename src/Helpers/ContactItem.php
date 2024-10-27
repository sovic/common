<?php

namespace Sovic\Common\Helpers;

use Sovic\Common\Entity\ContactItemInterface;
use Sovic\Common\Enum\ContactTypeId;

class ContactItem
{
    /**
     * @param ContactItemInterface[] $contacts
     * @param ContactTypeId[] $order
     */
    public static function orderByType(
        array $contacts,
        array $order = [
            ContactTypeId::Email,
            ContactTypeId::Phone,
            ContactTypeId::Web,
            ContactTypeId::Facebook,
            ContactTypeId::Twitter,
            ContactTypeId::Instagram,
            ContactTypeId::Threads,
        ]
    ): array {
        $resultByTypes = [];
        foreach ($contacts as $contact) {
            if (!isset($resultByTypes[$contact->getTypeId()->value])) {
                $resultByTypes[$contact->getTypeId()->value] = [];
            }
            $resultByTypes[$contact->getTypeId()->value][] = $contact;
        }
        $result = [];
        foreach ($order as $type) {
            if (isset($resultByTypes[$type->value])) {
                foreach ($resultByTypes[$type->value] as $contact) {
                    $result[] = $contact;
                }
            }
        }

        return $result;
    }
}

<?php
/**
 * The function checks if the default email for a user is valid.
 *
 * @param int|null $userId The User ID to check.
 *
 * @return int Returns:
 * -1: If $userId is empty.
 *  0: If the default email is invalid.
 *  1: If the default email is valid.
 */
private function checkDefaultEmailValid($userId = null) {
    // Comment 1: Check if $userId is empty.
    if (empty($userId)) {
        return -1; // Comment 2: Return -1 if $userId is empty.
    }

    // Comment 3: Get the default email for the user.
    $defaultEmail = $this->getDefaultEmailByUserId($userId);

    // Comment 4: If no default email is found, set a new one and retrieve it.
    if (empty($defaultEmail)) {
        $this->set_default_email($userId);
        $defaultEmail = $this->getDefaultEmailByUserId($userId);
    }

    // Comment 5: If still no default email, return -1.
    if (empty($defaultEmail)) {
        return -1;
    }

    // Comment 6: Check if the default email is valid and within the last 12 months.
    if ($defaultEmail['valid'] >= 1 && ($defaultEmail['validated_on'] > (time() - strtotime('-12 months')))) {
        return 1; // Comment 7: Return 1 if the default email is valid.
    }

    $email = $defaultEmail['email'];

    // Comment 8: Check if the email is empty or not a valid email address.
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return 2;
    }

    // Comment 9: Check if the email is valid using a custom validation function.
    $validationResults = $this->checkIfValid($email);

    if (!$validationResults) {
        return 0;
    } else {
        return 1;
    }
}
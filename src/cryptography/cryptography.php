<?php

$englishAlphabet = [
    "keys" => ["!", ")", "\"", "(", "£", "*", "%", "&", ">", "<", "@", "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o"],
    "values" => ["a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z"]
];

class Encryptor
{
    private $cryptionPairs;

    public function setEncryptionSets(array $pairs): void
    {
        $this->cryptionPairs = $pairs;
    }

    public function decrypt(string $encrypted): string
    {
        $res = '';

        foreach (mb_str_split($encrypted, 1, 'UTF-8') as $sign) {
            $index = array_search($sign, $this->cryptionPairs['keys']);


            if ($index === false) {
                $res .= $sign;
            } else {
                $res .= $this->cryptionPairs['values'][$index];
            }
        }

        return $res;
    }

    public function encrypt(string $message): string
    {
        $res = '';

        foreach (mb_str_split($message, 1, 'UTF-8') as $sign) {
            $index = array_search($sign, $this->cryptionPairs['values']);

            if ($index === false) {
                $res .= $sign;
            } else {
                $res .= $this->cryptionPairs['keys'][$index];
            }
        }

        return $res;
    }
}


// TASK 1a
$encryptedMessage1a = ')g!ld, j(!ad "> h>£ gdol>!o!" o!(!c>£';

$engCryptor = new Encryptor();
$engCryptor->setEncryptionSets($englishAlphabet);

echo $engCryptor->decrypt($encryptedMessage1a);
echo "<br>";
// TASK 1b
$message1b = 'Zażółć, gęślą jaźń.';

$plCryptor = new Encryptor();
$plCryptor->setEncryptionSets($englishAlphabet);
$encryptedMessage1b = $plCryptor->encrypt($message1b);
$decryptedMessage1b = $plCryptor->decrypt($encryptedMessage1b);

?>
<div>Zakodowana wiadomość: <strong><?php echo htmlspecialchars($encryptedMessage1b) ?></strong></div>
<div>Odkodowana wiadomość: <strong><?php echo htmlspecialchars($decryptedMessage1b) ?></strong></div>
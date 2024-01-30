<?php

interface Screen
{
    public function getDisplayChar(string $char): array | false;
}

class LCDScreen implements Screen
{
    private $supportedChars = [
        '0' => [
            [" ", "_", " "],
            ["|", " ", "|"],
            ["|", "_", "|"]
        ],

        '1' => [
            [" "],
            ["|"],
            ["|"]
        ],

        '2' => [
            [" ", "_", " "],
            [" ", "_", "|"],
            ["|", "_", " "]
        ],

        '3' => [
            [" ", "_", " "],
            [" ", "_", "|"],
            [" ", "_", "|"]
        ],

        '4' => [
            [" ", " ", " "],
            ["|", "_", "|"],
            [" ", " ", "|"]
        ],

        '5' => [
            [" ", "_", " "],
            ["|", "_", " "],
            [" ", "_", "|"]
        ],

        '6' => [
            [" ", "_", " "],
            ["|", "_", " "],
            ["|", "_", "|"]
        ],

        '7' => [
            [" ", "_", " "],
            [" ", " ", "|"],
            [" ", " ", "|"]
        ],

        '8' => [
            [" ", "_", " "],
            ["|", "_", "|"],
            ["|", "_", "|"]
        ],

        '9' => [
            [" ", "_", " "],
            ["|", "_", "|"],
            [" ", "_", "|"]
        ]
    ];

    public function getDisplayChar(string $char): array | false
    {
        $displayChar = $this->supportedChars[$char];

        if (empty($displayChar)) {
            $displayChar = false;
        }

        return $displayChar;
    }
}

class ScreenReader
{
    private Screen $screen;

    private $frameData = [];

    public function setScreen(Screen $screen): void
    {
        $this->screen = $screen;
    }

    public function loadFrameData(string $message)
    {
        $this->frameData = [];

        foreach (mb_str_split($message, 1, 'UTF-8') as $char) {
            $charData = $this->screen->getDisplayChar($char);

            if ($charData === false) {
                throw new Error(self::class . " error - message contains unsupported chars", 500);
            }

            $this->frameData[] = $charData;
        }
    }

    public function display(string $message): void
    {
        $this->loadFrameData($message);

        $frame2d = $this->frameData;
        $frameMaxX = count($frame2d) - 1;

        $displayString = "";

        while (!empty(array_filter($frame2d))) {
            foreach ($frame2d as $x => $y) {

                $displayString .= join("", $y[0]);

                if ($x === $frameMaxX) {
                    $displayString .= "\n";
                }

                array_shift($frame2d[$x]);
            }
        }

?>
        <script>
            console.log(`<?php echo $displayString ?>`);
        </script>
<?php
    }
}

// TASK 2
$messageToDisplay = "05648139072";

$lcdReader = new ScreenReader();
$lcdScreen = new LCDScreen();
$lcdReader->setScreen($lcdScreen);

// You can check result in js devtools console
$lcdReader->display($messageToDisplay);

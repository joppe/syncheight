<?php
/**
 * @author Joppe Aarts <joppe@apestaartje.info>
 * @copyright Apestaartje <http://apestaartje.info>
 */


/**
 * Class Lorem
 */
class Lorem
{
    /**
     * @var string
     */
    private $raw = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer libero ligula, aliquet eu eros quis, condimentum suscipit velit. Sed imperdiet lacinia velit, et accumsan nunc imperdiet vitae. Vestibulum mollis lectus libero, in fermentum nisl blandit at. Praesent tempus, ante non luctus eleifend, massa mauris mattis felis, at porta mauris tortor in est. Sed quis urna sodales, blandit ligula at, ornare ligula. Suspendisse et commodo justo. Vivamus ultricies blandit malesuada. Etiam bibendum rutrum justo quis dignissim. Aenean bibendum ex ac odio gravida, eget viverra urna facilisis. Vivamus euismod mauris sit amet nibh auctor, at vulputate dui ultrices. Sed eget dui ut odio aliquet egestas ac in purus. Donec quis tincidunt tellus, eu posuere turpis. Nulla sit amet tincidunt ante. Nunc sit amet consectetur risus. Ut pretium enim ipsum, non sagittis magna convallis et. Morbi condimentum quam in lorem fringilla venenatis. Vestibulum et imperdiet sapien. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed non orci in eros gravida vulputate sit amet id turpis. Phasellus ultricies libero mauris, nec convallis lorem rhoncus non. Nam vestibulum, enim at volutpat ullamcorper, odio neque euismod odio, id interdum urna ligula eu lacus. Nam posuere risus eu ornare tempor. Vestibulum efficitur velit at dictum tincidunt. Nam finibus pharetra turpis non porttitor. Donec varius nec leo maximus fermentum. Integer ac leo vehicula, ornare metus ultricies, semper risus. Nam pellentesque enim feugiat lobortis semper. Pellentesque urna est, eleifend in metus gravida, tempor semper libero. In quis ante maximus, iaculis augue et, luctus ligula. Nullam ut tortor imperdiet est pulvinar tristique eget at ligula. Donec finibus dui id justo lobortis, ac venenatis justo lobortis. In vel dolor tempus, placerat diam id, vehicula sem. Nunc quis libero eu purus tincidunt euismod. Sed ornare sapien tincidunt mollis molestie. Duis egestas ex in orci sollicitudin, eget vestibulum dolor venenatis. Suspendisse et luctus urna. Cras viverra dui ac gravida volutpat. Cras scelerisque tellus et tempor imperdiet. Pellentesque id mauris sed ante facilisis iaculis non nec diam. Sed euismod leo sed leo posuere, eget gravida augue condimentum. Nulla dignissim vel dolor vitae dignissim. In nisl arcu, egestas in eleifend in, efficitur vel mi. Nulla convallis suscipit lacus, commodo suscipit quam imperdiet vel. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla blandit, ante nec cursus feugiat, nisi arcu volutpat dolor, at ultrices libero purus ac turpis. Duis in sem ornare, fermentum ligula et, maximus arcu. Sed semper ex vel massa sodales, dapibus tincidunt urna suscipit. Sed ut congue nisi. Aenean condimentum enim sit amet suscipit mollis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nullam mollis vel massa in ultrices. Integer tristique purus vel ligula porta pharetra. Integer tincidunt ligula nec arcu blandit aliquam. Quisque hendrerit lectus leo, quis dictum elit ultrices id. Integer non efficitur nulla, vel posuere libero. Vestibulum bibendum bibendum odio in ultrices. Cras consectetur quam a nulla eleifend viverra. Nullam id elit feugiat arcu dignissim commodo. Ut tempor lectus ipsum, nec elementum arcu hendrerit quis. Integer ut varius ipsum. Pellentesque rutrum feugiat elit. Vivamus pulvinar lorem odio, vel convallis nisi egestas ac. Maecenas quis ultrices velit, ut eleifend dolor. Fusce commodo vehicula ipsum, et ultricies enim molestie nec.';

    /**
     * @var array
     */
    private $lines = array();

    /**
     * @var array
     */
    private $words = array();

    /**
     * @return array
     */
    private function getLines()
    {
        if (0 === count($this->lines)) {
            $this->lines = array_map(function ($line) {
                return trim($line);
            }, explode('.', $this->raw));
        }

        return $this->lines;
    }

    /**
     * @param int $lineCount
     * @return array
     */
    private function getRandomLines($lineCount = 1)
    {
        $lines = $this->getLines();
        $indexes = array_rand($lines, $lineCount);
        $indexes = is_array($indexes) ? $indexes : array($indexes);

        return array_map(function ($index) use ($lines) {
            return $lines[$index] . '.';
        }, $indexes);
    }

    /**
     * @return array
     */
    private function getWords()
    {
        if (0 === count($this->words)) {
            $text = strtolower($this->raw);
            $this->words = preg_split('/[\.,\s]+/', $text);
        }

        return $this->words;
    }

    /**
     * @param int $wordCount
     * @return array
     */
    private function getRandomWords($wordCount = 1)
    {
        $words = $this->getWords();
        $indexes = array_rand($words, $wordCount);

        return array_map(function ($index) use ($words) {
            return $words[$index];
        }, $indexes);
    }

    /**
     * @param int $wordCount
     * @return string
     */
    public function getTitle($wordCount = 4)
    {
        $title = implode(' ', $this->getRandomWords($wordCount));

        return ucfirst($title);
    }

    /**
     * @param int $wordCount
     * @return string
     */
    public function getSentence($wordCount = 20)
    {
        $title = implode(' ', $this->getRandomWords($wordCount));

        return ucfirst($title) . '.';
    }

    /**
     * @param int $paragraphCount
     * @return string
     */
    public function getParagraphs($paragraphCount = 1)
    {
        $lines = $this->getRandomLines($paragraphCount);

        return implode('', array_map(function ($line) {
            return sprintf('<p>%s</p>', $line);
        }, $lines));
    }
}
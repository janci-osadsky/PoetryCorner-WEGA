<?php
include('includes/udaje.php');
include('includes/functions/funkcie.php');

$title = isset($current_language) && $current_language === 'sk' ? 
    "Kto je Janči?" : "Who's Johnny?";

include('includes/hlavicka.php');
?>

<div class="container">
    <div class="row">
        <?php
        // Content cards
        $sections = [
            [
                'title' => ['sk' => "Rýchlo o mne", 'en' => "Quick about"],
                'content' => ['sk' => "Som mladý študent, ktorého kreativita tlačí v hlave, preto som sa rozhodol podeliť s niektorými dielami, dúfam, že sa páčia!",
                 'en' => "I am a young student whose creativity is bubbling in his mind, so I decided to share some of my precious poems, I hope you like them!"]
            ],
            [
                'title' => ['sk' => "Viera", 'en' => "Faith"],
                'content' => ['sk' => "Viera je veľkou súčasťou môjho života a verím, že každý môže nájsť živý vzťah s Bohom, môžno práve aj niektorou mojou básňou.",
                 'en' => "Faith is a significant part of my life, and I believe that everyone can find a living relationship with God, perhaps even through one of my poems."]
            ],
            [
                'title' => ['sk' => "Záľuby", 'en' => "Hobbies"],
                'content' => ['sk' => "Veľmi rád hrám hokej, športujem, ale aj hrám rôzne hry a lámem si hlavu nad hlavolamami. Som riadny extrovert, takže nudu skutočne nepoznám!",
                 'en' => "I really enjoy playing hockey, staying active, and also playing various games and solving puzzles. I'm a true extrovert, so I really don't know boredom!"]
            ],
            [
                'title' => ['sk' => "Rodina a priatelia", 'en' => "Family & Friends"],
                'content' => ['sk' => "Mám 3 úžasných súrodencov, parádnu rodinu, ktorú mám veľmi rád, čo je hádam vidno aj viacerým básňam, ktoré som o nich napísal. K básňam ma priviedla práve moja mama.",
                 'en' => "I have 3 amazing siblings, a wonderful family that I love very much, which is perhaps evident in several poems I've written about them. It was my mom who inspired me to write poems."]
            ],
            [
                'title' => ['sk' => "Škola", 'en' => "School"],
                'content' => ['sk' => "Študujem teoretickú informatiku na MatFyze, Univerzita Komenského Bratislava.",
                 'en' => "I study theoretical computer science at the Faculty of Mathematics, Comenius University in Bratislava."]
            ],
            [
                'title' => ['sk' => "Hry", 'en' => "Games"],
                'content' => ['sk' => "Milujem stolné hry, čo prezdrádza aj môj zápal pre ostané projekty, ako napríklad moja vlastná kartová hra the Way (thewayccg.com).",
                 'en' =>"I love board games, which also reveals my passion for other projects, such as my own card game the Way (thewayccg.com)."]
            ],
        ];

        // Render cards
        foreach ($sections as $section) {
            ?>
            <div class="col-md-4">
                <div class="card poetry-card mb-4">
                    <div class="card-body">
                        <h2 class="card-title"><?php echo $section['title'][$current_language === 'sk' ? 'sk' : 'en']; ?></h2>
                        <p class="card-text"><?php echo $section['content'][$current_language === 'sk' ? 'sk' : 'en']; ?></p>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</div>

<?php include('includes/pata.php'); ?>

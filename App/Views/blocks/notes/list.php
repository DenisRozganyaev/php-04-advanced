<div class="tab-content bg-transparent">
    <div id="note-full-container" class="note-has-grid row">
        <?php
        foreach ($notes as $note) {
            view('blocks/notes/grid', compact('note'));
        }
        ?>
    </div>
</div>
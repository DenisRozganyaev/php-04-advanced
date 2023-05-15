<?php

class Document
{
    protected string $content;
    protected string $name;

    public function open()
    {
        d('it is opened');
    }

}

class WritableDocument extends Document
{
    public function save()
    {
        d('it is saved');
    }
}

class Project
{
    protected array $documents = [];
    protected array $writableDocument = [];

    public function addDoc(Document $document)
    {
        $this->documents[] = $document;
    }

    public function addWritableDoc(WritableDocument $document)
    {
        $this->writableDocument[] = $document;
    }

    public function openAll()
    {
        foreach ($this->documents as $document) {
            $document->open();
        }
    }

    public function saveAll()
    {
        foreach ($this->writableDocument as $document) {
            $document->save();
        }
    }
}

$project = new Project();
$project->addDoc(new Document());
$project->addDoc(new Document());
$project->addWritableDoc(new WritableDocument());
$project->addWritableDoc(new WritableDocument());
$project->addWritableDoc(new WritableDocument());
$project->addDoc(new Document());
$project->addDoc(new Document());
$project->openAll();
$project->saveAll();
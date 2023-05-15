<?php

class Document
{
    protected string $content;
    protected string $name;


    public function open()
    {
        d('it is opened');
    }

    public function save()
    {
        d('it is saved');
    }
}

class ReadOnlyDocument extends Document
{
    public function save()
    {
        throw new Exception('It can be saved!');
    }
}

class Project
{
    protected array $documents = [];

    public function addDoc(Document $document)
    {
        $this->documents[] = $document;
    }

    public function openAll()
    {
        foreach ($this->documents as $document) {
            $document->open();
        }
    }

    public function saveAll()
    {
        foreach ($this->documents as $document) {
            if (!$document instanceof ReadOnlyDocument) {
                $document->save();
            }
        }
    }
}

$project = new Project();
$project->addDoc(new Document());
$project->addDoc(new Document());
$project->addDoc(new ReadOnlyDocument());
$project->addDoc(new ReadOnlyDocument());
$project->addDoc(new ReadOnlyDocument());
$project->addDoc(new Document());
$project->addDoc(new Document());
$project->openAll();
$project->saveAll();
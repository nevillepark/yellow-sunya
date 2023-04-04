<?php
// Sunya extension, https://github.com/nevillepark/yellow-sunya

class YellowSunya {
    const VERSION = "0.8.1";
    public $yellow;         // access to API

    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
    }

    // Handle update
    public function onUpdate($action) {
        $fileName = $this->yellow->system->get("coreExtensionDirectory").$this->yellow->system->get("coreSystemFile");
        if ($action=="install") {
            $this->yellow->system->save($fileName, array("theme" => "sunya"));
        } elseif ($action=="uninstall" && $this->yellow->system->get("theme")=="sunya") {
            $this->yellow->system->save($fileName, array("theme" => $this->yellow->system->getDifferent("theme")));
        }
    }
}

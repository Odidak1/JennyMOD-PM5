<?php
declare(strict_types=1);

namespace Odidak\JennyMOD;

use pocketmine\Server;
use pocketmine\player\Player;

use pocketmine\plugin\PluginBase;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;

use jojoe77777\FormAPI\CustomForm;

class Main extends PluginBase implements Listener{
    
    public function onEnable() : void
    {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        
        @mkdir($this->getDataFolder());
       $this->saveDefaultConfig();
       $this->getResource("config.yml");
       
    }

    public function onCommand(CommandSender $sender, Command $cmd, String $label, Array $args) : bool {
        
        if($cmd->getName() == "jenny"){
            $this->JENNYMOD($sender);
        }
        
        return true;
    }
    
    public function JENNYMOD($player){
        $form = new CustomForm(function(Player $player, $data) {
        });
        
        $form->setTitle("JENNY MOD");
        $form->addLabel("Dalam hadis yang diriwayatkan oleh Ziyad bin ‘Illaqah dari pamannya, Quthbah bin Malik, ia berkata bahwa Nabi Muhammad saw. membaca doa berikut:\n\nAllohumma Inni A’udzu Bika Min Munkarootil Akhlaaqi Wal A’maali Wal Ahwaa.\n\nArtinya: Ya Allah, aku berlindung kepada-Mu dari akhlak, amal, dan hawa nafsu yang jelek.");
        $form->sendToPlayer($player);
        return $form;
    }
}
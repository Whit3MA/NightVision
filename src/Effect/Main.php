<?php

namespace Effect;

use pocketmine\Server;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\utils\TextFormat;
use pocketmine\entity\Effect;
use pocketmine\entity\Living;
use pocketmine\entity\EffectInstance;

class Main extends PluginBase implements Listener {

    public function onEnable() {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);    
        $this->getLogger()->info(TextFormat::GREEN . "Activer");
    }
    public function onDisable() {
        $this->getLogger()->info(TextFormat::RED . "Desactiver");
    }
    public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args) : bool {
        switch($cmd->getName()){                    
            case "nv":               
                     $this->Menu($sender);                               
            break;         
            
         }  
        return true;                         
    }
   
    public function Menu($sender){ 
        $api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
        $form = $api->createSimpleForm(function (Player $sender, int $data = null) { 
            $result = $data;
            if($result === null){
                return true;
            }             
            switch($result){
                case 0:
       
					
                $eff = new EffectInstance(Effect::getEffect(Effect::NIGHT_VISION), 100 * 99999, 100, true);
                $sender->addEffect($eff);
                $sender->sendMessage("§anightvision: On");
                break;
                    
                case 1:
                $sender->removeEffect(Effect::NIGHT_VISION);
                $sender->sendMessage("§anightvision: Off");
                break;
            }
            
            
            });
            $form->setTitle("§6Menu NightVision");
            $form->setContent("NightVision:");
            $form->addButton("Activer");
            $form->addButton("Desactiver");
            $form->addButton("Quitter");
            $form->sendToPlayer($sender);
            return $form;                                            
    }

 

  
                                                                                                                                                                                                                                                                                          
}
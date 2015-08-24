<?php
/**
 * Description of Operations
 *
 * @author Jefferson Patron
 */

class Operations
{

    public static function processInput($dataInput)
    {
        $result = array();

        $result = getData($dataInput);
        
        if (ValidationController::validate($dataInput)) {

            $commands = Controller::getCommandsFromInput($dataInput);

            $cursor = 1;
            for ($i = 0; $i < $commands[0]; $i++) {
                $cursor = Controller::interpreteSubCommand($commands, $cursor, $result);
            }
        }
        return $result;
    }

    private static function interpreteSubCommand($commands, $cursor, &$result)
    {
        $cube = new Cube(explode(' ', $commands[$cursor])[0]);
        $rows = explode(' ', $commands[$cursor])[1];
        $cursor++;
        for ($i = 0; $i < $rows; $i++) {
            Controller::interpreteCommand($commands[$cursor], $cube, $result);
            $cursor++;
        }

        return $cursor;
    }

    private static function interpreteCommand($command, Cube $cube, &$result)
    {
        $commandHeader = explode(" ", $command)[0];
        if (strcmp($commandHeader, UPDATE_COMMAND) == 0)
            Controller::executeCommandUpdate(explode(" ", $command), $cube);
        else if (strcmp($commandHeader, QUERY_COMMAND) == 0)
            Controller::executeCommandQuery(explode(" ", $command), $cube, $result);

    }


    private static function executeCommandQuery($commandExploded, Cube $cube, &$result)
    {
        $queryResult = 0;

        for ($i = $commandExploded[1]; $i <= $commandExploded[4]; $i++)
            for ($j = $commandExploded[2]; $j <= $commandExploded[5]; $j++)
                for ($k = $commandExploded[3]; $k <= $commandExploded[6]; $k++)
                    $queryResult += $cube->getValueAt($i, $j, $k);

        $result[] = $queryResult;
    }

    private static function executeCommandUpdate($commandExploded, Cube $cube)
    {
        $cube->setValueAt($commandExploded[4], $commandExploded[1], $commandExploded[2], $commandExploded[3]);
    }

    public static function getData($data)
    {
        return explode("\n", $data);
    }

}


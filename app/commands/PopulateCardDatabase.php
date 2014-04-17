<?php namespace App\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use App\Models\Interfaces\CardRepositoryInterface;
use App\Services\Interfaces\CardFeedParserInterface;
Use Config, App;

class PopulateCardDatabase extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'cards:populate';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Populates the card database from a fresh cards.xml feed.';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct(CardRepositoryInterface $cards, CardFeedParserInterface $parser)
	{
        $this->cards = $cards;
        $this->parser = $parser;
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
        $cards = $this->parser->parse()->getCards();
        
        if ($this->argument('truncate')) {
            $this->cards->truncate();
            foreach ($cards as $card) {
                $this->cards->store($card);
            }
        } else {
            foreach ($cards as $card) {
                $dbCard = $this->cards->findByName($card['name']);
                if (empty($dbCard)) { 
                    $this->cards->store($card);
                }
            }
        }
		
        
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array(
            array('truncate', null, InputArgument::OPTIONAL, 'Truncate the database before import')
		);
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return array(
		);
	}

}

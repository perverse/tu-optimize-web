<?php namespace App\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use App\Models\Repositories\EloquentUserRepository;
Use Config;

class DownloadCardXml extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'cards:download';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Downloads the current cards.xml';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		file_put_contents(Config::get('cardsync.save_path'), file_get_contents(Config::get('cardsync.sync_url')));
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array(
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

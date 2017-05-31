<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{


		\DB::table('users')->delete();

		\DB::table('users')->insert(array (
			0 =>
				array (
					'name' => 'Michael Hopkins',
					'email' => 'mhopkins321@gmail.com',
					'password' => '$2y$10$aSyW3LAp8z0O2O2fvrk6xOXtTthW2k76PEpBzfWWkhih9dIXzixSO',
					'remember_token' => '849QgKPuVdZk5FASncl1kgIZtFabrrzggSEFa3NB1SSvIOBtNUwo1bNxOlFv',
					'created_at' => '2017-05-29 20:08:56',
					'updated_at' => '2017-05-29 20:08:56',
				),
			1 =>
				array (
					'name' => 'Mr. Humberto Kuhic',
					'email' => 'agustin.schmidt@example.net',
					'password' => '$2y$10$ktsVJemCcswxgvnoFmHqyOV68IwNnP6sdme4irgRvEk.9Rvr4TYR2',
					'remember_token' => 'WdhIO58sXH',
					'created_at' => '2017-05-29 20:09:12',
					'updated_at' => '2017-05-29 20:09:12',
				),
			2 =>
				array (
					'name' => 'Keven Pacocha',
					'email' => 'wilber.walsh@example.org',
					'password' => '$2y$10$ktsVJemCcswxgvnoFmHqyOV68IwNnP6sdme4irgRvEk.9Rvr4TYR2',
					'remember_token' => 'HLwHyNs7DA',
					'created_at' => '2017-05-29 20:09:12',
					'updated_at' => '2017-05-29 20:09:12',
				),
			3 =>
				array (
					'name' => 'Pierre Osinski',
					'email' => 'nitzsche.vickie@example.com',
					'password' => '$2y$10$ktsVJemCcswxgvnoFmHqyOV68IwNnP6sdme4irgRvEk.9Rvr4TYR2',
					'remember_token' => '8wphYCjncZ',
					'created_at' => '2017-05-29 20:09:12',
					'updated_at' => '2017-05-29 20:09:12',
				),
			4 =>
				array (
					'name' => 'Miss Carolyn Cremin PhD',
					'email' => 'mosciski.vivienne@example.org',
					'password' => '$2y$10$ktsVJemCcswxgvnoFmHqyOV68IwNnP6sdme4irgRvEk.9Rvr4TYR2',
					'remember_token' => 'engWAz0Gbj',
					'created_at' => '2017-05-29 20:09:12',
					'updated_at' => '2017-05-29 20:09:12',
				),
			5 =>
				array (
					'name' => 'Ford White',
					'email' => 'darrell57@example.org',
					'password' => '$2y$10$ktsVJemCcswxgvnoFmHqyOV68IwNnP6sdme4irgRvEk.9Rvr4TYR2',
					'remember_token' => '10SzhWfQGT',
					'created_at' => '2017-05-29 20:09:12',
					'updated_at' => '2017-05-29 20:09:12',
				),
			6 =>
				array (
					'name' => 'Dr. Eliseo Zulauf III',
					'email' => 'lesch.jody@example.org',
					'password' => '$2y$10$ktsVJemCcswxgvnoFmHqyOV68IwNnP6sdme4irgRvEk.9Rvr4TYR2',
					'remember_token' => 'tzneDXHW5n',
					'created_at' => '2017-05-29 20:09:12',
					'updated_at' => '2017-05-29 20:09:12',
				),
			7 =>
				array (
					'name' => 'Dr. Garnett Runolfsdottir III',
					'email' => 'runte.kayden@example.com',
					'password' => '$2y$10$ktsVJemCcswxgvnoFmHqyOV68IwNnP6sdme4irgRvEk.9Rvr4TYR2',
					'remember_token' => 'IWvVa4VTnj',
					'created_at' => '2017-05-29 20:09:12',
					'updated_at' => '2017-05-29 20:09:12',
				),
			8 =>
				array (
					'name' => 'Steve Glover',
					'email' => 'olaf14@example.net',
					'password' => '$2y$10$ktsVJemCcswxgvnoFmHqyOV68IwNnP6sdme4irgRvEk.9Rvr4TYR2',
					'remember_token' => 'MHfnDzWPQc',
					'created_at' => '2017-05-29 20:09:12',
					'updated_at' => '2017-05-29 20:09:12',
				),
			9 =>
				array (
					'name' => 'Larissa Connelly',
					'email' => 'dickinson.josie@example.org',
					'password' => '$2y$10$ktsVJemCcswxgvnoFmHqyOV68IwNnP6sdme4irgRvEk.9Rvr4TYR2',
					'remember_token' => 'YWTbsuyJak',
					'created_at' => '2017-05-29 20:09:12',
					'updated_at' => '2017-05-29 20:09:12',
				),
			10 =>
				array (
					'name' => 'Richie Kertzmann',
					'email' => 'yerdman@example.net',
					'password' => '$2y$10$ktsVJemCcswxgvnoFmHqyOV68IwNnP6sdme4irgRvEk.9Rvr4TYR2',
					'remember_token' => '2rZFTxjNxh',
					'created_at' => '2017-05-29 20:09:12',
					'updated_at' => '2017-05-29 20:09:12',
				),
			11 =>
				array (
					'name' => 'Prof. Bonita Kuvalis I',
					'email' => 'irogahn@example.net',
					'password' => '$2y$10$ktsVJemCcswxgvnoFmHqyOV68IwNnP6sdme4irgRvEk.9Rvr4TYR2',
					'remember_token' => '77x0TsqnHU',
					'created_at' => '2017-05-29 20:09:12',
					'updated_at' => '2017-05-29 20:09:12',
				),
			12 =>
				array (
					'name' => 'Mr. Eduardo Fisher',
					'email' => 'swaniawski.jessika@example.org',
					'password' => '$2y$10$ktsVJemCcswxgvnoFmHqyOV68IwNnP6sdme4irgRvEk.9Rvr4TYR2',
					'remember_token' => 'I8uouvnTtQ',
					'created_at' => '2017-05-29 20:09:12',
					'updated_at' => '2017-05-29 20:09:12',
				),
			13 =>
				array (
					'name' => 'Tyler Stokes Jr.',
					'email' => 'susie50@example.org',
					'password' => '$2y$10$ktsVJemCcswxgvnoFmHqyOV68IwNnP6sdme4irgRvEk.9Rvr4TYR2',
					'remember_token' => '1Igv9nmeJs',
					'created_at' => '2017-05-29 20:09:12',
					'updated_at' => '2017-05-29 20:09:12',
				),
			14 =>
				array (
					'name' => 'Celine Bashirian',
					'email' => 'ava41@example.org',
					'password' => '$2y$10$ktsVJemCcswxgvnoFmHqyOV68IwNnP6sdme4irgRvEk.9Rvr4TYR2',
					'remember_token' => 'uOqXUM1KQO',
					'created_at' => '2017-05-29 20:09:12',
					'updated_at' => '2017-05-29 20:09:12',
				),
			15 =>
				array (
					'name' => 'Delmer Hilll',
					'email' => 'vernie84@example.com',
					'password' => '$2y$10$ktsVJemCcswxgvnoFmHqyOV68IwNnP6sdme4irgRvEk.9Rvr4TYR2',
					'remember_token' => 'Y9jKwWQmlb',
					'created_at' => '2017-05-29 20:09:12',
					'updated_at' => '2017-05-29 20:09:12',
				),
			16 =>
				array (
					'name' => 'Zita Walker',
					'email' => 'ehessel@example.org',
					'password' => '$2y$10$ktsVJemCcswxgvnoFmHqyOV68IwNnP6sdme4irgRvEk.9Rvr4TYR2',
					'remember_token' => 'dJJbxk8VAI',
					'created_at' => '2017-05-29 20:09:12',
					'updated_at' => '2017-05-29 20:09:12',
				),
			17 =>
				array (
					'name' => 'Emilia Pacocha',
					'email' => 'wkuhlman@example.com',
					'password' => '$2y$10$ktsVJemCcswxgvnoFmHqyOV68IwNnP6sdme4irgRvEk.9Rvr4TYR2',
					'remember_token' => 'InyRS3Q5dF',
					'created_at' => '2017-05-29 20:09:12',
					'updated_at' => '2017-05-29 20:09:12',
				),
			18 =>
				array (
					'name' => 'Alison Hartmann',
					'email' => 'alice74@example.org',
					'password' => '$2y$10$ktsVJemCcswxgvnoFmHqyOV68IwNnP6sdme4irgRvEk.9Rvr4TYR2',
					'remember_token' => '4isGADPONl',
					'created_at' => '2017-05-29 20:09:12',
					'updated_at' => '2017-05-29 20:09:12',
				),
			19 =>
				array (
					'name' => 'Carmela Fay',
					'email' => 'niko.reichert@example.net',
					'password' => '$2y$10$ktsVJemCcswxgvnoFmHqyOV68IwNnP6sdme4irgRvEk.9Rvr4TYR2',
					'remember_token' => 'IEPHrP5E6T',
					'created_at' => '2017-05-29 20:09:12',
					'updated_at' => '2017-05-29 20:09:12',
				),
			20 =>
				array (
					'name' => 'Bradley Bernhard',
					'email' => 'oconnell.janice@example.net',
					'password' => '$2y$10$ktsVJemCcswxgvnoFmHqyOV68IwNnP6sdme4irgRvEk.9Rvr4TYR2',
					'remember_token' => 'MZeiuywm38',
					'created_at' => '2017-05-29 20:09:12',
					'updated_at' => '2017-05-29 20:09:12',
				),
			21 =>
				array (
					'name' => 'Tavares Trantow',
					'email' => 'loren05@example.net',
					'password' => '$2y$10$ktsVJemCcswxgvnoFmHqyOV68IwNnP6sdme4irgRvEk.9Rvr4TYR2',
					'remember_token' => 'Lj7ktkM6Ay',
					'created_at' => '2017-05-29 20:09:12',
					'updated_at' => '2017-05-29 20:09:12',
				),
			22 =>
				array (
					'name' => 'Neil Hoppe',
					'email' => 'hope70@example.com',
					'password' => '$2y$10$ktsVJemCcswxgvnoFmHqyOV68IwNnP6sdme4irgRvEk.9Rvr4TYR2',
					'remember_token' => 'j8b61D82wq',
					'created_at' => '2017-05-29 20:09:12',
					'updated_at' => '2017-05-29 20:09:12',
				),
			23 =>
				array (
					'name' => 'Yasmin Kuhlman',
					'email' => 'pfeest@example.org',
					'password' => '$2y$10$ktsVJemCcswxgvnoFmHqyOV68IwNnP6sdme4irgRvEk.9Rvr4TYR2',
					'remember_token' => 'MC0jPdq9Wr',
					'created_at' => '2017-05-29 20:09:12',
					'updated_at' => '2017-05-29 20:09:12',
				),
			24 =>
				array (
					'name' => 'Jedidiah Smith',
					'email' => 'martine.greenfelder@example.net',
					'password' => '$2y$10$ktsVJemCcswxgvnoFmHqyOV68IwNnP6sdme4irgRvEk.9Rvr4TYR2',
					'remember_token' => 'PebNOTGg1Z',
					'created_at' => '2017-05-29 20:09:12',
					'updated_at' => '2017-05-29 20:09:12',
				),
			25 =>
				array (
					'name' => 'Elisha Doyle',
					'email' => 'gail.bode@example.com',
					'password' => '$2y$10$ktsVJemCcswxgvnoFmHqyOV68IwNnP6sdme4irgRvEk.9Rvr4TYR2',
					'remember_token' => 'qSFwOtgINx',
					'created_at' => '2017-05-29 20:09:12',
					'updated_at' => '2017-05-29 20:09:12',
				),
			26 =>
				array (
					'name' => 'Nelson Swaniawski',
					'email' => 'winnifred.farrell@example.com',
					'password' => '$2y$10$ktsVJemCcswxgvnoFmHqyOV68IwNnP6sdme4irgRvEk.9Rvr4TYR2',
					'remember_token' => 'N4X7DEsq0G',
					'created_at' => '2017-05-29 20:09:12',
					'updated_at' => '2017-05-29 20:09:12',
				),
			27 =>
				array (
					'name' => 'Oleta Glover',
					'email' => 'hane.herman@example.org',
					'password' => '$2y$10$ktsVJemCcswxgvnoFmHqyOV68IwNnP6sdme4irgRvEk.9Rvr4TYR2',
					'remember_token' => 'X1MOdqxFhD',
					'created_at' => '2017-05-29 20:09:12',
					'updated_at' => '2017-05-29 20:09:12',
				),
			28 =>
				array (
					'name' => 'Marshall Smith',
					'email' => 'zboncak.macie@example.net',
					'password' => '$2y$10$ktsVJemCcswxgvnoFmHqyOV68IwNnP6sdme4irgRvEk.9Rvr4TYR2',
					'remember_token' => '6fkyITtvvh',
					'created_at' => '2017-05-29 20:09:12',
					'updated_at' => '2017-05-29 20:09:12',
				),
			29 =>
				array (
					'name' => 'Dax Rogahn',
					'email' => 'stehr.frederique@example.org',
					'password' => '$2y$10$ktsVJemCcswxgvnoFmHqyOV68IwNnP6sdme4irgRvEk.9Rvr4TYR2',
					'remember_token' => 'REABTt9VHs',
					'created_at' => '2017-05-29 20:09:12',
					'updated_at' => '2017-05-29 20:09:12',
				),
			30 =>
				array (
					'name' => 'Miss Brooke Daugherty',
					'email' => 'itromp@example.com',
					'password' => '$2y$10$ktsVJemCcswxgvnoFmHqyOV68IwNnP6sdme4irgRvEk.9Rvr4TYR2',
					'remember_token' => 'JogOkYsXBv',
					'created_at' => '2017-05-29 20:09:12',
					'updated_at' => '2017-05-29 20:09:12',
				),
			31 =>
				array (
					'name' => 'Edna Spencer',
					'email' => 'savannah.wisozk@example.org',
					'password' => '$2y$10$ktsVJemCcswxgvnoFmHqyOV68IwNnP6sdme4irgRvEk.9Rvr4TYR2',
					'remember_token' => '1GTZp6Db00',
					'created_at' => '2017-05-29 20:09:12',
					'updated_at' => '2017-05-29 20:09:12',
				),
			32 =>
				array (
					'name' => 'Meggie Tremblay I',
					'email' => 'adalberto95@example.net',
					'password' => '$2y$10$ktsVJemCcswxgvnoFmHqyOV68IwNnP6sdme4irgRvEk.9Rvr4TYR2',
					'remember_token' => '39029S2Ynq',
					'created_at' => '2017-05-29 20:09:12',
					'updated_at' => '2017-05-29 20:09:12',
				),
			33 =>
				array (
					'name' => 'Charles Hand',
					'email' => 'moore.madisyn@example.com',
					'password' => '$2y$10$ktsVJemCcswxgvnoFmHqyOV68IwNnP6sdme4irgRvEk.9Rvr4TYR2',
					'remember_token' => 'JnZJYws1I5',
					'created_at' => '2017-05-29 20:09:12',
					'updated_at' => '2017-05-29 20:09:12',
				),
			34 =>
				array (
					'name' => 'Prof. Hunter Hegmann PhD',
					'email' => 'wyman.rosina@example.org',
					'password' => '$2y$10$ktsVJemCcswxgvnoFmHqyOV68IwNnP6sdme4irgRvEk.9Rvr4TYR2',
					'remember_token' => 'bolV0QK2RR',
					'created_at' => '2017-05-29 20:09:12',
					'updated_at' => '2017-05-29 20:09:12',
				),
			35 =>
				array (
					'name' => 'Dr. Justine Franecki',
					'email' => 'viviane.beahan@example.net',
					'password' => '$2y$10$ktsVJemCcswxgvnoFmHqyOV68IwNnP6sdme4irgRvEk.9Rvr4TYR2',
					'remember_token' => 'unfqR2YQSh',
					'created_at' => '2017-05-29 20:09:12',
					'updated_at' => '2017-05-29 20:09:12',
				),
			36 =>
				array (
					'name' => 'Prof. Jayson Purdy',
					'email' => 'woodrow75@example.com',
					'password' => '$2y$10$ktsVJemCcswxgvnoFmHqyOV68IwNnP6sdme4irgRvEk.9Rvr4TYR2',
					'remember_token' => 'cA93aE82zt',
					'created_at' => '2017-05-29 20:09:12',
					'updated_at' => '2017-05-29 20:09:12',
				),
			37 =>
				array (
					'name' => 'Randy Padberg III',
					'email' => 'huel.tatyana@example.org',
					'password' => '$2y$10$ktsVJemCcswxgvnoFmHqyOV68IwNnP6sdme4irgRvEk.9Rvr4TYR2',
					'remember_token' => 'jrnAqWpL5H',
					'created_at' => '2017-05-29 20:09:12',
					'updated_at' => '2017-05-29 20:09:12',
				),
			38 =>
				array (
					'name' => 'Prof. Elisa Olson Jr.',
					'email' => 'demarcus.turner@example.net',
					'password' => '$2y$10$ktsVJemCcswxgvnoFmHqyOV68IwNnP6sdme4irgRvEk.9Rvr4TYR2',
					'remember_token' => 'oWoRmGZNpz',
					'created_at' => '2017-05-29 20:09:12',
					'updated_at' => '2017-05-29 20:09:12',
				),
			39 =>
				array (
					'name' => 'Annabell Jaskolski',
					'email' => 'jeremie03@example.net',
					'password' => '$2y$10$ktsVJemCcswxgvnoFmHqyOV68IwNnP6sdme4irgRvEk.9Rvr4TYR2',
					'remember_token' => 'lJerJRkM4o',
					'created_at' => '2017-05-29 20:09:12',
					'updated_at' => '2017-05-29 20:09:12',
				),
			40 =>
				array (
					'name' => 'Lavern Skiles',
					'email' => 'dibbert.jesse@example.com',
					'password' => '$2y$10$ktsVJemCcswxgvnoFmHqyOV68IwNnP6sdme4irgRvEk.9Rvr4TYR2',
					'remember_token' => '8qXbDWdftL',
					'created_at' => '2017-05-29 20:09:12',
					'updated_at' => '2017-05-29 20:09:12',
				),
			41 =>
				array (
					'name' => 'Hildegard Yundt',
					'email' => 'lynch.norval@example.org',
					'password' => '$2y$10$ktsVJemCcswxgvnoFmHqyOV68IwNnP6sdme4irgRvEk.9Rvr4TYR2',
					'remember_token' => 'dBnq8NAkOO',
					'created_at' => '2017-05-29 20:09:12',
					'updated_at' => '2017-05-29 20:09:12',
				),
			42 =>
				array (
					'name' => 'Filomena Mueller',
					'email' => 'bwitting@example.com',
					'password' => '$2y$10$ktsVJemCcswxgvnoFmHqyOV68IwNnP6sdme4irgRvEk.9Rvr4TYR2',
					'remember_token' => 'ikagmCaqU9',
					'created_at' => '2017-05-29 20:09:12',
					'updated_at' => '2017-05-29 20:09:12',
				),
			43 =>
				array (
					'name' => 'Zena Kautzer',
					'email' => 'hegmann.grayce@example.net',
					'password' => '$2y$10$ktsVJemCcswxgvnoFmHqyOV68IwNnP6sdme4irgRvEk.9Rvr4TYR2',
					'remember_token' => '8pi2zG8nRF',
					'created_at' => '2017-05-29 20:09:12',
					'updated_at' => '2017-05-29 20:09:12',
				),
			44 =>
				array (
					'name' => 'Lula Goodwin',
					'email' => 'tgutmann@example.org',
					'password' => '$2y$10$ktsVJemCcswxgvnoFmHqyOV68IwNnP6sdme4irgRvEk.9Rvr4TYR2',
					'remember_token' => 'aWermqU6NO',
					'created_at' => '2017-05-29 20:09:12',
					'updated_at' => '2017-05-29 20:09:12',
				),
			45 =>
				array (
					'name' => 'Berenice Dicki',
					'email' => 'patrick.nicolas@example.net',
					'password' => '$2y$10$ktsVJemCcswxgvnoFmHqyOV68IwNnP6sdme4irgRvEk.9Rvr4TYR2',
					'remember_token' => 'XcsRwb98Qs',
					'created_at' => '2017-05-29 20:09:12',
					'updated_at' => '2017-05-29 20:09:12',
				),
			46 =>
				array (
					'name' => 'Aubree Kemmer DVM',
					'email' => 'brooks83@example.org',
					'password' => '$2y$10$ktsVJemCcswxgvnoFmHqyOV68IwNnP6sdme4irgRvEk.9Rvr4TYR2',
					'remember_token' => 'VvMX28dyIT',
					'created_at' => '2017-05-29 20:09:12',
					'updated_at' => '2017-05-29 20:09:12',
				),
			47 =>
				array (
					'name' => 'Antonette Corwin',
					'email' => 'jhammes@example.org',
					'password' => '$2y$10$ktsVJemCcswxgvnoFmHqyOV68IwNnP6sdme4irgRvEk.9Rvr4TYR2',
					'remember_token' => 'x7KtwLeb9h',
					'created_at' => '2017-05-29 20:09:12',
					'updated_at' => '2017-05-29 20:09:12',
				),
			48 =>
				array (
					'name' => 'Dejah Adams Sr.',
					'email' => 'langosh.bernie@example.org',
					'password' => '$2y$10$ktsVJemCcswxgvnoFmHqyOV68IwNnP6sdme4irgRvEk.9Rvr4TYR2',
					'remember_token' => 'AIg1C7p2wo',
					'created_at' => '2017-05-29 20:09:12',
					'updated_at' => '2017-05-29 20:09:12',
				),
			49 =>
				array (
					'name' => 'Dr. Stephany Bins',
					'email' => 'nikolaus.albert@example.org',
					'password' => '$2y$10$ktsVJemCcswxgvnoFmHqyOV68IwNnP6sdme4irgRvEk.9Rvr4TYR2',
					'remember_token' => 'ktMqQ8oVPI',
					'created_at' => '2017-05-29 20:09:12',
					'updated_at' => '2017-05-29 20:09:12',
				),
			50 =>
				array (
					'name' => 'Marcia Beahan',
					'email' => 'marley32@example.com',
					'password' => '$2y$10$ktsVJemCcswxgvnoFmHqyOV68IwNnP6sdme4irgRvEk.9Rvr4TYR2',
					'remember_token' => 'nUrVryJ8FD',
					'created_at' => '2017-05-29 20:09:12',
					'updated_at' => '2017-05-29 20:09:12',
				),
			51 =>
				array (
					'name' => 'Lupe Brakus',
					'email' => 'crystal.reilly@example.net',
					'password' => '$2y$10$/VsWxbqtGhT6bHqjO4y/OOtnWiAMyx06XabkHNsXaZdyKp6NKbugW',
					'remember_token' => 'gQEbBMaF9q',
					'created_at' => '2017-05-30 02:02:58',
					'updated_at' => '2017-05-30 02:02:58',
				),
			52 =>
				array (
					'name' => 'Violet Runolfsdottir',
					'email' => 'tkoss@example.com',
					'password' => '$2y$10$/VsWxbqtGhT6bHqjO4y/OOtnWiAMyx06XabkHNsXaZdyKp6NKbugW',
					'remember_token' => 'GmXfIFwsRX',
					'created_at' => '2017-05-30 02:03:06',
					'updated_at' => '2017-05-30 02:03:06',
				),
			53 =>
				array (
					'name' => 'Elmo Ward',
					'email' => 'rath.vincenzo@example.net',
					'password' => '$2y$10$/VsWxbqtGhT6bHqjO4y/OOtnWiAMyx06XabkHNsXaZdyKp6NKbugW',
					'remember_token' => 'i9Lurl8kH2',
					'created_at' => '2017-05-30 02:03:34',
					'updated_at' => '2017-05-30 02:03:34',
				),
		));


	}
}
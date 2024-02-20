<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Datasource\Exception\RecordNotFoundException;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @property \App\Model\Table\SubCategoriesTable $SubCategories
 * @property \App\Model\Table\SearchRecordsTable $SearchRecords
 * @property \App\Model\Table\SubcategoriesTransportsTable $subcategoriesTransports
 * @var string[] $mapboxContents //for content block
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    /**
     * Controller initialize override
     *
     * @return void
     */
    public function initialize(): void
    {
        parent::initialize();

        // Controller-level function/action whitelist for authentication
        $this->Authentication->allowUnauthenticated(['lifestyle', 'matching', 'score']);
        $this->Addresses = $this->fetchTable('Addresses');
        $this->SearchRecords = $this->fetchTable('SearchRecords');
        $this->SubcategoriesTransports = $this->fetchTable('SubcategoriesTransports');
        $this->SubCategories = $this->fetchTable('SubCategories');
        // Mapbox page content block
        $contents = $this->fetchTable('Contents');
        $mapboxContents = $contents
            ->find('list', [
                'keyField' => 'hint',
                'valueField' => 'content_value',
            ])
            ->where(['parent' => 'mapbox']) // Limit the search to mapbox only by the parent field
            ->toArray();
        $this->set(compact('mapboxContents'));
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $user = $this->Authentication->getIdentity();
        if ($user->get('role') != 'admin') { // User & Visitor (non-registered User) will be redirected to home page
            return $this->redirect(['controller' => 'Pages', 'action' => 'home']);
        } else {
            $users = $this->paginate($this->Users);
            $this->set(compact('users'));
        }
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Authentication->getIdentity();
        if ($user->get('role') != 'admin') { // User & Visitor (non-registered User) will be redirected to home page
            return $this->redirect(['controller' => 'Pages', 'action' => 'home']);
        } else {
            $user = $this->Users->get($id, [
                'contain' => [],
                // 'contain' => ['CategoryTransports', 'SearchRecords'],
            ]);
            $this->set(compact('user'));
        }
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Authentication->getIdentity();
        if ($user->get('role') != 'admin') { // User & Visitor (non-registered User) will be redirected to home page
            return $this->redirect(['controller' => 'Pages', 'action' => 'home']);
        } else {
            $user = $this->Users->newEmptyEntity();
            if ($this->request->is('post')) {
                $user = $this->Users->patchEntity($user, $this->request->getData());
                if ($this->Users->save($user)) {
                    $this->Flash->success(__('The user has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
            $this->set(compact('user'));
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Authentication->getIdentity();
        if ($user->get('role') != 'admin') { // User & Visitor (non-registered User) will be redirected to home page
            return $this->redirect(['controller' => 'Pages', 'action' => 'home']);
        } else {
            $user = $this->Users->get($id, [
                'contain' => [],
            ]);
            if ($this->request->is(['patch', 'post', 'put'])) {
                $user = $this->Users->patchEntity($user, $this->request->getData());
                if ($this->Users->save($user)) {
                    $this->Flash->success(__('The user has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
            $this->set(compact('user'));
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $user = $this->Authentication->getIdentity();
        if ($user->get('role') != 'admin') { // User & Visitor (non-registered User) will be redirected to home page
            return $this->redirect(['controller' => 'Pages', 'action' => 'home']);
        } else {
            $this->request->allowMethod(['post', 'delete']);
            $user = $this->Users->get($id);
            if ($this->Users->delete($user)) {
                $this->Flash->success(__('The user has been deleted.'));
            } else {
                $this->Flash->error(__('The user could not be deleted. Please, try again.'));
            }
            return $this->redirect(['action' => 'index']);
        }
    }

    /**
     * Reset Password method
     *
     */

    /**
     * Lifestyle Preferences method
     */
    public function lifestyle()
    {
        $categoryModel = $this->fetchTable('Categories');
        $categories = $categoryModel->find()->contain(['SubCategories']);
        $this->set(compact('categories'));
        // Check whether User has an account in the database or not
        // grab session token or cookie
        $user = $this->Authentication->getIdentity();
        if ($user == null) { // Check that a Visitor (non-registered User) is accessing the web page
            $userToken = $this->request->getCookie('csrfToken');
            if ($userToken == null) { // Cannot find current csrfToken cookie if Visitor accessed Lifestyle page directly from the URL without first opening the Home page, reloads the Lifestyle page to generate the csrfToken cookie which is saved in Line 184
                return $this->redirect(['controller' => 'Users', 'action' => 'lifestyle']);
            } else {  // Saves ID as the current cookie csrfToken - session ID
                $userToken = (substr($userToken, 0, 36)); // only saves the first 36 characters of the cookie
                try { // Checks if the Visitor's current token session is stored in the Database
                    $user = $this->Users->get($userToken);
                } catch (RecordNotFoundException $exception) { // Saves Visitor's current token session into Database
                    $user = $this->Users->newEmptyEntity();
                    $user->id = $userToken;
                    $this->Users->save($user);
                }
            }
        } elseif ($user->get('role') == "admin" or "user") { // Add functionality for Admin or Users
            // Enter code here
        } else { // This condition should never be met, but redirects the browser to the home page
            $this->Flash->error(__('Invalid account detected, please contact administrator for assistance.'));
            return $this->redirect(['controller' => 'Pages', 'action' => 'home']);
        }
    }

    /**
     * Matching to Property Address method
     */
    public function matching()
    {
        // $this->request->allowMethod(['post']);  // If you really want to ensure people coming to matching page by POSTing...
        $user = $this->Authentication->getIdentity();
        if ($user == null) { // Check that a Visitor (non-registered User) is accessing the web page
            $userToken = $this->request->getCookie('csrfToken');
            if ($userToken == null) { // Cannot find current csrfToken cookie if Visitor accessed Matching page directly from the URL without first opening the Home or Lifestyle page, redirects to Lifestyle page to generate a form
                return $this->redirect(['controller' => 'Users', 'action' => 'lifestyle']);
            } else {  // Saves ID as the current cookie csrfToken - session ID
                $userToken = (substr($userToken, 0, 36)); // only saves the first 36 characters of the cookie
                try { // Checks if the Visitor's current token session is stored in the Database
                    $user = $this->Users->get($userToken);
                } catch (RecordNotFoundException $exception) { // Saves Visitor's current token session into Database
                    $user = $this->Users->newEmptyEntity();
                    $user->id = $userToken;
                    $this->Users->save($user);
                }
            }
        } elseif ($user->get('role') == "admin" or "user") {
            $preferences = json_decode($this->request->getData('preferences'));
            $userPreferences = $this->Users->get($user->id, ['contain' => ['SubcategoriesTransports']])->subcategories_transports; //Retrieves User's Lifestyle Preferences from Database
            if ($preferences == null) { // No Lifestyle Preferences selected
                if (count($userPreferences) == 0) { // No Lifestyle Preferences saved by User previously
                    // Enter code here
                }
            } else { // Lifestyle Preferences selected
                if (count($preferences) <= count($this->fetchTable('SubCategories')->find('list')->toArray())) { // Dynamic check that the Lifestyle preferences selected by the User does not exceed the amount of preferences available
                    // Delete User's previously saved Lifestyle Preferences from the Database
                    foreach ($userPreferences as $userPreference) {
                        $this->SubcategoriesTransports->delete($userPreference);
                    }
                    // Save new Lifestyle Preferences for Users
                    foreach ($preferences as $preference) {
                        $subcategoryTransports = $this->SubcategoriesTransports->newEmptyEntity();
                        $subcategoryTransports->user_id = $user->id;
                        $subcategoryTransports->subCategory_id = $preference->sub_category_id;
                        $subcategoryTransports->transport_id = $preference->transport_id;
                        $subcategoryTransports->proximity = $preference->travel_time;
                        $this->SubcategoriesTransports->save($subcategoryTransports);
                    }
                } else { // Cannot find current csrfToken cookie if Visitor accessed Lifestyle page directly from the URL without first opening the Home page, reloads the Lifestyle page to generate the csrfToken cookie which is saved in Line 176
                    $this->Flash->error(__('Invalid account detected, please contact administrator for assistance.'));
                    return $this->redirect(['controller' => 'Pages', 'action' => 'home']);
                }
            }
        }
    }

    /**
     * Score method
     */
    public function score()
        /**
         * @param \App\Controller\decimal|null $longitude Address longitude
         * @param \App\Controller\decimal|null $latidude Address latitude
         */
    {
        // Mapbox page content block
        $contents = $this->fetchTable('Contents');
        $mapboxContents = $contents
            ->find('list', [
                'keyField' => 'hint',
                'valueField' => 'content_value',
            ])
            ->where(['parent' => 'mapbox'])  // Limit the search to mapbox only by the parent field
            ->toArray();
        $this->set(compact('mapboxContents'));
        // Fetch Categories & SubCategories
        $categoryModel = $this->fetchTable('Categories');
        $categories = $categoryModel->find()->contain(['SubCategories']);
        $this->set(compact('categories'));

        // Get Addresses
        $property_location = json_decode($this->request->getData('address-origin'));
        $poi_location = json_decode($this->request->getData('address-destination'));

        // Get Preferences values
        $preferences = json_decode($this->request->getData('preferences'));

        // Get Specific Location values
        $travel_mode_specific = $this->request->getData('travel-mode');
        $travel_time_specific = $this->request->getData('travel-time-desired');

        // Retrieve Mapbox Token from Content Block Database
        $mapboxAccessToken = $mapboxContents['token'];

        //Save Property Address (Origin) into Database
        if ($property_location != null) {
            $originCoordinates = $property_location->center;
            $addressOrigin = $this->Addresses->newEmptyEntity();
            $addressOrigin->longitude = $originCoordinates[0];
            $addressOrigin->latitude = $originCoordinates[1];
            $addressOrigin->street_no = $property_location->address;
            $addressOrigin->street_name = $property_location->text;
            $addressOrigin->postcode = $property_location->context[0]->text;
            $addressOrigin->city = $property_location->context[1]->text;
            $addressOrigin->state = $property_location->context[3]->text;
            $addressOrigin->country = $property_location->context[4]->text;
            $this->Addresses->save($addressOrigin);
        } else {
            $this->Flash->error('Please fill in a valid Property Address'); ////////////////////////////////// Data Validation ////////////////////////////////////////////////
            return $this->redirect(['controller' => 'Users', 'action' => 'matching']);
        }

        //Save Specific Location Address (Destination) into Database
        if ($poi_location != null) {
            $destinationCoordinates = $poi_location->center;
            $addressDestination = $this->Addresses->newEmptyEntity();
            $addressDestination->longitude = $destinationCoordinates[0];
            $addressDestination->latitude = $destinationCoordinates[1];
            $addressDestination->street_no = $poi_location->address;
            $addressDestination->street_name = $poi_location->text;
            $addressDestination->postcode = $poi_location->context[0]->text;
            $addressDestination->city = $poi_location->context[1]->text;
            $addressDestination->state = $poi_location->context[3]->text;
            $addressDestination->country = $poi_location->context[4]->text;
            $this->Addresses->save($addressDestination);
        } elseif ($preferences == null) { // If no Lifestyle Preferences & Specific Location were selected
            $this->Flash->error('Please fill in some Lifestyle Preferences'); ////////////////////////////////// Data Validation ////////////////////////////////////////////////
            return $this->redirect(['controller' => 'Pages', 'action' => 'home']);
        }

        // PREFERENCES
        function curl_get_contents($url)
        {
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            $data = curl_exec($ch);
            curl_close($ch);

            return $data;
        }

        $totalMatchScore = [];
        $preferenceCoordArray = [];
        if ($preferences != null) {
            foreach ($preferences as $preference) {
                $subCategoryPreference = $this->SubCategories->get($preference->sub_category_id)->api_name;
                $apiPreferenceUrl = "https://api.mapbox.com/search/searchbox/v1/category/{$subCategoryPreference}?access_token={$mapboxAccessToken}&language=en&limit=5&proximity={$originCoordinates[0]},{$originCoordinates[1]}";
                $responsePref = curl_get_contents($apiPreferenceUrl);
                if ($responsePref) {
                    $responsePrefDecode = json_decode($responsePref, true);
                    // actual travel time from the API response (in seconds)
                    $preferenceCoordinates = $responsePrefDecode['features'][0]['geometry']['coordinates'];
                    array_push($preferenceCoordArray, $preferenceCoordinates);
                    $directionsFromPreference = "https://api.mapbox.com/directions/v5/{$preference->travel_mode}/{$originCoordinates[0]},{$originCoordinates[1]};{$preferenceCoordinates[0]},{$preferenceCoordinates[1]}?access_token={$mapboxAccessToken}";
                    $responseDirection = curl_get_contents($directionsFromPreference);
                    $responseDirectionDecode = json_decode($responseDirection, true);
                    $actualTravelTime = $responseDirectionDecode['routes'][0]['duration'];

                    //convert input travel time to seconds
                    $final_pref_travel_time = ((int)$preference->travel_time) * 60;

                    // get the match score based on formula
                    if ($final_pref_travel_time > $actualTravelTime) {
                        $matchScoreSpecific = 100;
                    } elseif ($final_pref_travel_time <= 0) {
                        $matchScoreSpecific = 0;
                    } else {
                        $matchScoreSpecific = 100 - (($actualTravelTime - $final_pref_travel_time) / $final_pref_travel_time * 100);
                        // Ensure the match score is not negative
                        $matchScoreSpecific = max($matchScoreSpecific, 0);
                    }
                } else {
                    // display an error message or redirect to an error page here.
                    $matchScoreSpecific = 0;
                }
                array_push($totalMatchScore, round($matchScoreSpecific));
            }
        }

        $this->set('totalMatchScore', $totalMatchScore);

        $preferenceCoordJson = json_encode($preferenceCoordArray);
        $this->set('preferenceCoordJson', $preferenceCoordJson);
        $this->render('score');

        if ($poi_location != null) {
            // SPECIFIC LOCATION
            $apiUrl = "https://api.mapbox.com/directions/v5/{$travel_mode_specific}/{$originCoordinates[0]},{$originCoordinates[1]};{$destinationCoordinates[0]},{$destinationCoordinates[1]}?access_token={$mapboxAccessToken}";
            $response = curl_get_contents($apiUrl);
            if ($response) {
                $responseData = json_decode($response, true);
                // actual travel time from the API response (in seconds)
                $actualTravelTime = $responseData['routes'][0]['duration'];
                // get the match score based on formula
                if ($travel_time_specific > $actualTravelTime) {
                    $matchScoreSpecific = 100;
                } elseif ($travel_time_specific <= 0) {
                    $matchScoreSpecific = 0;
                } else {
                    $matchScoreSpecific = 100 - (($actualTravelTime - $travel_time_specific) / $travel_time_specific * 100);
                    // Ensure the match score is not negative
                    $matchScoreSpecific = max($matchScoreSpecific, 0);
                }
            } else {
                // EMPTY SPECIFIC LOCATION
                $matchScoreSpecific = 0;
            }

            // Pass & render  matchScoreSpecific to the view
            $this->set('matchScoreSpecific', round($matchScoreSpecific));
            $this->render('score');

            //for FINAL match score:
            // turn array & specific value to int
            $integerIDs = array_map('intval', $totalMatchScore);
            $matchScoreSpecificVal = (int)$matchScoreSpecific;

            // find average
            if ($poi_location != null) {
                $avgScore = (array_sum($integerIDs) + $matchScoreSpecificVal) / (count($integerIDs) + 1);

            } else {
                $avgScore = (array_sum($integerIDs)) / (count($integerIDs));
            }
            // output score
            $this->set('avgScore', round($avgScore));
            $this->render('score');

            // Save Specific Location - Search Record to Database
            $user = $this->Authentication->getIdentity(); // Check User via Authentication if they are logged in
            $searchRecord = $this->SearchRecords->newEmptyEntity();
            if ($user == null) { // If User is not logged in, request their session Token and saves it as their User ID
                if ($this->request->getCookie('csrfToken')) {
                    $searchRecord->user_id = $this->request->getCookie('csrfToken');
                } else {
                    return $this->redirect(['controller' => 'Users', 'action' => 'score']);
                }
            } elseif ($user->get('role')) { // Saves Admin or User's ID to Search Record
                $searchRecord->user_id = $user->id;
            } else { // Cannot find current csrfToken cookie if Visitor accessed Lifestyle page directly from the URL without first opening the Home page, reloads the Lifestyle page to generate the csrfToken cookie which is saved in Line 176
                return $this->redirect(['controller' => 'Pages', 'action' => 'home']);
            }
            $searchRecord->address_id = $addressOrigin->id;
            $searchRecord->score = round($avgScore); // Saves Final match score to Search Record
            $this->SearchRecords->save($searchRecord);
        }
    }
}

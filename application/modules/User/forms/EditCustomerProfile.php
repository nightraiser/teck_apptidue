<?php

class User_Form_EditCustomerProfile extends Zend_Form
{

	public function init()
	{
		$salutionList = array(
		array('key'=>'Mr','value'=>'Mr'),
		array('key'=>'Ms','value'=>'Ms'),
		array('key'=>'Mrs','value'=>'Mrs')
		);
		 
		$gengerList   = array(
		array('key'=>'Male','value'=>'Male'),
		array('key'=>'Female','value'=>'Female')
		);
		 
		/* Populating State Base Data */

		/* $cityMapper  = new Application_Model_CityDataMapper();
		 $citys = $cityMapper->fetchAll();
		 $cityList = array();
		 foreach($citys as $city){
		 $cityList[] = array('key'=>$city->getId(),'value'=>$city->getDescription());
		 }*/
		 
		$stateMapper  = new Application_Model_StateDataMapper();
		$states = $stateMapper->fetchAll();
		$stateList = array();
		$stateList[] = array('key'=>'','value'=>'Select State');
		foreach($states as $state){
			$stateList[] = array('key'=>$state->getId(),'value'=>$state->getDescription());
		}
		 
		$timezoneMapper = new Application_Model_TimeZoneDataMapper();
		$timezones = $timezoneMapper->fetchAll();
		$timezoneList = array();
		$timezoneList[] = array('key'=>'','value'=>'Select TimeZone');
		foreach ($timezones as $timezone){
			$timezoneList[] = array('key'=>$timezone->getCode(),'value'=>$timezone->getCode().$timezone->getDescription());
		}

		$userId = $this->createElement('hidden','userid');
		$userId->removeDecorator('Label')
		->removeDecorator('HtmlTag');
		 
		$emailAddress =  $this->createElement('text', 'emailAddress');
		$emailAddress->removeDecorator('Label')
		->removeDecorator('HtmlTag')
		->setAttrib('class','inp1')
		->setAttrib('maxlength', '40')
		->setAttrib('readonly','readonly')
		->setValue('')
		->setRequired(false);


		$salution = $this->createElement('select', 'salution');
		$salution->removeDecorator('Label')
		->removeDecorator('HtmlTag')
		->setAttrib('class', 'sel2')
		->addMultiOptions($salutionList)
		->setRequired(false);

		$firstName =  $this->createElement('text', 'firstName');
		$firstName->removeDecorator('Label')
		->removeDecorator('HtmlTag')
		->setAttrib('maxlength', '30')
		->setAttrib('class','inp1')
		->addFilters(array('StringTrim'))
		->addValidators(array(array('NotEmpty', true, array('messages' => 'Please enter FirstName.')),
		array('StringLength', false,array(0,30)),array('Alnum')))
		->setValue('')
		->setRequired(true);

		$lastName = $this->createElement('text', 'lastName');
		$lastName->removeDecorator('Label')
		->removeDecorator('HtmlTag')
		->setAttrib('maxlength', '30')
		->setAttrib('class','inp1')
		->addFilters(array('StringTrim'))
		->addValidators(array(array('StringLength', false,array(0,30)),array('Alnum')))
		->setValue('')
		->setRequired(false);
		 
//		$gender = $this->createElement('select','gender');
//		$gender->removeDecorator('Label')
//		->removeDecorator('HtmlTag')
//		->setAttrib('class', 'sel2')
//		->addMultiOptions($gengerList)
//		->setRequired(false);
		 
		$address =  $this->createElement('textarea', 'address',array( 'rows' => '4', 'cols' => '40' ));
		$address->removeDecorator('Label')
		->removeDecorator('HtmlTag')
		->setAttrib('maxlength', '200')
		->addFilters(array('StringTrim'))
		->addValidators(array
		(array('NotEmpty', true, array('messages' => 'Please enter your Address.')),
		array('StringLength', false,array(1,200,'messages' => array(
		Zend_Validate_StringLength::TOO_SHORT =>'address should be minimum 10 charactors',
		Zend_Validate_StringLength::TOO_LONG => 'address is too long(>200).'
		)))))
		->setValue('')
		->setRequired(false);

//		$city = $this->createElement('select', 'city');
//		$city->removeDecorator('Label')
//		->removeDecorator('HtmlTag')
//		->setAttrib('class', 'sel1')
//		->addValidators(array
//		(array('NotEmpty', true, array('messages' => 'Please select City.'))))
//		->setRegisterInArrayValidator(false)
//		->setRequired(true);
//		
//		$region = $this->createElement('select', 'region');
//		$region->removeDecorator('Label')
//		->removeDecorator('HtmlTag')
//		->setAttrib('class', 'sel1')
//		->addValidators(array
//		(array('NotEmpty', true, array('messages' => 'Please select Region.'))))
//		->setRegisterInArrayValidator(false)
//		->setRequired(true);
//
//		$neighborhood = $this->createElement('select','neighborhood');
//		$neighborhood->removeDecorator('Label')
//		->removeDecorator('HtmlTag')
//		->setAttrib('class','sel1')
//		->addValidators(array
//		(array('NotEmpty', true, array('messages' => 'Please select Neighborhood.'))))
//		->setRegisterInArrayValidator(false)
//		->setRequired(true);
//		 
//		$state = $this->createElement('select','state');
//		$state->removeDecorator('Label')
//		->removeDecorator('HtmlTag')
//		->setAttrib('class', 'sel1')
//		->addValidators(array
//		(array('NotEmpty', true, array('messages' => 'Please select State.'))))
//		->addMultiOptions($stateList)
//		->setRequired(true);

//		$timezone = $this->createElement('select','timezone');
//		$timezone->removeDecorator('label')
//		->removeDecorator('HtmlTag')
//		->setAttrib('class','sel1')
//		->addValidators(array
//		(array('NotEmpty', true, array('messages' => 'Please select TimeZone.'))))
//		->addMultiOptions($timezoneList)
//		->setRequired(true);


		$postalCode =  $this->createElement('text', 'postalCode');
		$postalCode->removeDecorator('Label')
		->removeDecorator('HtmlTag')
		->setAttrib('maxlength', '10')
		->setAttrib('class','inp1')
		->addFilters(array('StringTrim'))
		->addValidators(array
		(array('NotEmpty', true, array('messages' => 'Please enter Zip code.'))
		))
		->setValue('')
		->setRequired(false);
		 
		$phone = $this->createElement('text', 'phone');
		$phone->removeDecorator('Label')
		->removeDecorator('HtmlTag')
		->setAttrib('class','inp1')
		->setAttrib('maxlength', '15')
		->addFilters(array('StringTrim'))
		->addValidators(array(array('NotEmpty', true, array('messages' => 'Please enter Your Phone Number.')),
		))

		->setValue('')
		->setRequired(true);

		$favoritefood = $this->createElement('textarea', 'favoritefood');
		$favoritefood->removeDecorator('Label')
		->removeDecorator('HtmlTag')
		->setAttrib('maxlength', '1000')
		->addFilters(array('StringTrim'))
		->addValidator('StringLength', false,array(0,1000,'messages' => array(
		Zend_Validate_StringLength::TOO_SHORT =>'favoritefood should be minimum 10 charactors',
		Zend_Validate_StringLength::TOO_LONG => 'favoritefood is too long(>1000).'
		)))
		->setAttrib('cols', '40')
		->setAttrib('rows', '4')
		->setValue('');

		$favoritemusic =  $this->createElement('textarea', 'favoritemusic',array( 'rows' => '4', 'cols' => '40' ));
		$favoritemusic->removeDecorator('lable')
		->removeDecorator('HtmlTag')
		->setAttrib('maxlength', '1000')
		->addFilters(array('StringTrim'))
		->addValidator('StringLength', false,array(0,1000,'messages' => array(
		Zend_Validate_StringLength::TOO_SHORT =>'favoritemusic should be minimum 10 charactors',
		Zend_Validate_StringLength::TOO_LONG => 'favoritemusic is too long(>1000).'
		)))
		->setvalue('')
		->setrequired(false);
		 

		$update = $this->createElement('submit','update');
		$update->setLabel("Update")
		->removeDecorator('DtDdWrapper')
		->setAttrib('class','submitBtn')
		->setIgnore(true);

		 
		$this->addElements( array ($userId,
		$emailAddress,
		$salution,
		$firstName,
		$lastName,
//		$gender,
		$address,
//		$region,
//		$city,
//		$state,
//		$timezone,
//		$neighborhood,
		$postalCode,
		$phone,
		$favoritefood,
		$favoritemusic,
		$update
		 
		)
		);
	}


}


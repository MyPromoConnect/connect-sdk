<?php

namespace MyPromo\Connect\SDK\Models;

use MyPromo\Connect\SDK\Contracts\Arrayable;

/**
 * Class Address
 * @package Connect\SDK\Models
 */
class Address implements Arrayable
{
    /**
     * @var string
     */
    protected $reference;

    /**
     * @var string
     */
    protected $company;

    /**
     * @var string
     */
    protected $department;

    /**
     * @var string
     */
    protected $firstname;

    /**
     * @var string
     */
    protected $lastname;

    /**
     * @var string
     */
    protected $street;

    /**
     * @var string
     */
    protected $careOf;

    /**
     * @var string
     */
    protected $zip;

    /**
     * @var string
     */
    protected $city;

    /**
     * @var string
     */
    protected $stateCode;

    /**
     * @var string
     */
    protected $district;

    /**
     * @var string
     */
    protected $countryCode;

    /**
     * @var string
     */
    protected $phone;

    /**
     * @var string
     */
    protected $fax;

    /**
     * @var string
     */
    protected $mobile;

    /**
     * @var string
     */
    protected $email;

    /**
     * @var string
     */
    protected $vatId;

    /**
     * @var string
     */
    protected $iban;

    /**
     * @var string
     */
    protected $bicOrSwift;

    /**
     * @var string
     */
    protected $accountHolder;

    /**
     * @var string
     */
    protected $eoriNumber;

    /**
     * @var string
     */
    protected $commercialRegisterEntry;

    /**
     * @return string
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * @param string $reference
     */
    public function setReference($reference)
    {
        $this->reference = $reference;
    }

    /**
     * @return string
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @param string $company
     */
    public function setCompany($company)
    {
        $this->company = $company;
    }

    /**
     * @return string
     */
    public function getDepartment()
    {
        return $this->department;
    }

    /**
     * @param string $department
     */
    public function setDepartment($department)
    {
        $this->department = $department;
    }

    /**
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * @return string
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * @param string $street
     */
    public function setStreet($street)
    {
        $this->street = $street;
    }

    /**
     * @return string
     */
    public function getCareOf()
    {
        return $this->careOf;
    }

    /**
     * @param string $careOf
     */
    public function setCareOf($careOf)
    {
        $this->careOf = $careOf;
    }

    /**
     * @return string
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * @param string $zip
     */
    public function setZip($zip)
    {
        $this->zip = $zip;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return string
     */
    public function getStateCode()
    {
        return $this->stateCode;
    }

    /**
     * @param string $stateCode
     */
    public function setStateCode($stateCode)
    {
        $this->stateCode = $stateCode;
    }

    /**
     * @return string
     */
    public function getDistrict()
    {
        return $this->district;
    }

    /**
     * @param string $district
     */
    public function setDistrict($district)
    {
        $this->district = $district;
    }

    /**
     * @return string
     */
    public function getCountryCode()
    {
        return $this->countryCode;
    }

    /**
     * @param string $countryCode
     */
    public function setCountryCode($countryCode)
    {
        $this->countryCode = $countryCode;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return string
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * @param string $fax
     */
    public function setFax($fax)
    {
        $this->fax = $fax;
    }

    /**
     * @return string
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * @param string $mobile
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getVatId()
    {
        return $this->vatId;
    }

    /**
     * @param string $vatId
     */
    public function setVatId($vatId)
    {
        $this->vatId = $vatId;
    }

    /**
     * @return string
     */
    public function getIban()
    {
        return $this->iban;
    }

    /**
     * @param string $iban
     */
    public function setIban($iban)
    {
        $this->iban = $iban;
    }

    /**
     * @return string
     */
    public function getBicOrSwift()
    {
        return $this->bicOrSwift;
    }

    /**
     * @param string $bicOrSwift
     */
    public function setBicOrSwift($bicOrSwift)
    {
        $this->bicOrSwift = $bicOrSwift;
    }

    /**
     * @return string
     */
    public function getAccountHolder()
    {
        return $this->accountHolder;
    }

    /**
     * @param string $accountHolder
     */
    public function setAccountHolder($accountHolder)
    {
        $this->accountHolder = $accountHolder;
    }

    /**
     * @return string
     */
    public function getEoriNumber()
    {
        return $this->eoriNumber;
    }

    /**
     * @param string $eoriNumber
     */
    public function setEoriNumber($eoriNumber)
    {
        $this->eoriNumber = $eoriNumber;
    }

    /**
     * @return string
     */
    public function getCommercialRegisterEntry()
    {
        return $this->commercialRegisterEntry;
    }

    /**
     * @param string $commercialRegisterEntry
     */
    public function setCommercialRegisterEntry($commercialRegisterEntry)
    {
        $this->commercialRegisterEntry = $commercialRegisterEntry;
    }

    /**
     * {@inheritDoc}
     */
    public function toArray()
    {
        $addressArray = [
            'reference'                 => $this->reference,
            'company'                   => $this->company,
            'department'                => $this->department,
            'firstname'                 => $this->firstname,
            'lastname'                  => $this->lastname,
            'street'                    => $this->street,
            'care_of'                   => $this->careOf,
            'zip'                       => $this->zip,
            'city'                      => $this->city,
            'state_code'                => $this->stateCode,
            'district'                  => $this->district,
            'country_code'              => $this->countryCode,
            'phone'                     => $this->phone,
            'fax'                       => $this->fax,
            'mobile'                    => $this->mobile,
            'email'                     => $this->email,
            'vat_id'                    => $this->vatId,
            'eori_number'               => $this->eoriNumber,
            'account_holder'            => $this->accountHolder,
            'iban'                      => $this->iban,
            'bic_or_swift'              => $this->bicOrSwift,
        ];

        if (!empty($this->commercialRegisterEntry)){
            $addressArray['commercial_register_entry'] = $this->commercialRegisterEntry;
        }

        return $addressArray;
    }
}

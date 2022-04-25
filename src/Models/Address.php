<?php

namespace MyPromo\Connect\SDK\Models;

use DateTimeInterface;
use MyPromo\Connect\SDK\Contracts\Arrayable;
use MyPromo\Connect\SDK\Helpers\Date;

/**
 * Class Address
 *
 * @package Connect\SDK\Models
 */
class Address implements Arrayable
{
    /**
     * @var int|null
     */
    protected $address_id;

    /**
     * @var string|null
     */
    protected $address_key;

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
    protected $salutation;

    /**
     * @var string
     */
    protected $gender;

    /**
     * @var DateTimeInterface
     */
    protected $date_of_birth;

    /**
     * @var string
     */
    protected $firstname;

    /**
     * @var string
     */
    protected $middlename;

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
     * @var int|null
     */
    protected $templateId = null;


    /**
     * @return int|null
     */
    public function getAddressId()
    {
        return $this->address_id;
    }

    /**
     * @param int|null $address_id
     */
    public function setAddressId(?int $address_id)
    {
        $this->address_id = $address_id;
    }

    /**
     * @return string
     */
    public function getAddressKey()
    {
        return $this->address_key;
    }

    /**
     * @param string|null $address_key
     */
    public function setAddressKey(?string $address_key)
    {
        $this->address_key = $address_key;
    }

    /**
     * @return string
     */
    public function getSalutation()
    {
        return $this->salutation;
    }

    /**
     * @param string|null $salutation
     */
    public function setSalutation(?string $salutation)
    {
        $this->salutation = $salutation;
    }

    /**
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param string|null $gender
     */
    public function setGender(?string $gender)
    {
        $this->gender = $gender;
    }

    /**
     * @return DateTimeInterface
     */
    public function getDateOfBirth(): DateTimeInterface
    {
        return $this->date_of_birth;
    }

    /**
     * @param DateTimeInterface $date_of_birth
     */
    public function setDateOfBirth(DateTimeInterface $date_of_birth)
    {
        Date::validate($date_of_birth);

        $this->date_of_birth = $date_of_birth;
    }

    /**
     * @return string
     */
    public function getMiddlename(): string
    {
        return $this->middlename;
    }

    /**
     * @param string|null $middlename
     */
    public function setMiddlename(?string $middlename)
    {
        $this->middlename = $middlename;
    }

    /**
     * @return string
     */
    public function getReference(): string
    {
        return $this->reference;
    }

    /**
     * @param string|null $reference
     */
    public function setReference(?string $reference)
    {
        $this->reference = $reference;
    }

    /**
     * @return string
     */
    public function getCompany(): string
    {
        return $this->company;
    }

    /**
     * @param string $company
     */
    public function setCompany(string $company)
    {
        $this->company = $company;
    }

    /**
     * @return string
     */
    public function getDepartment(): string
    {
        return $this->department;
    }

    /**
     * @param string|null $department
     */
    public function setDepartment(?string $department)
    {
        $this->department = $department;
    }

    /**
     * @return string
     */
    public function getFirstname(): string
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     */
    public function setFirstname(string $firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * @return string
     */
    public function getLastname(): string
    {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     */
    public function setLastname(string $lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * @return string
     */
    public function getStreet(): string
    {
        return $this->street;
    }

    /**
     * @param string $street
     */
    public function setStreet(string $street)
    {
        $this->street = $street;
    }

    /**
     * @return string
     */
    public function getCareOf(): string
    {
        return $this->careOf;
    }

    /**
     * @param string|null $careOf
     */
    public function setCareOf(?string $careOf)
    {
        $this->careOf = $careOf;
    }

    /**
     * @return string
     */
    public function getZip(): string
    {
        return $this->zip;
    }

    /**
     * @param string|null $zip
     */
    public function setZip(string $zip)
    {
        $this->zip = $zip;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity(string $city)
    {
        $this->city = $city;
    }

    /**
     * @return string
     */
    public function getStateCode(): string
    {
        return $this->stateCode;
    }

    /**
     * @param string $stateCode
     */
    public function setStateCode(string $stateCode)
    {
        $this->stateCode = $stateCode;
    }

    /**
     * @return string
     */
    public function getDistrict(): string
    {
        return $this->district;
    }

    /**
     * @param string|null $district
     */
    public function setDistrict(?string $district)
    {
        $this->district = $district;
    }

    /**
     * @return string
     */
    public function getCountryCode(): string
    {
        return $this->countryCode;
    }

    /**
     * @param string $countryCode
     */
    public function setCountryCode(string $countryCode)
    {
        $this->countryCode = $countryCode;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @param string|null $phone
     */
    public function setPhone(?string $phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return string
     */
    public function getFax(): string
    {
        return $this->fax;
    }

    /**
     * @param string|null $fax
     */
    public function setFax(?string $fax)
    {
        $this->fax = $fax;
    }

    /**
     * @return string
     */
    public function getMobile(): string
    {
        return $this->mobile;
    }

    /**
     * @param string|null $mobile
     */
    public function setMobile(?string $mobile)
    {
        $this->mobile = $mobile;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     */
    public function setEmail(?string $email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getVatId(): string
    {
        return $this->vatId;
    }

    /**
     * @param string|null $vatId
     */
    public function setVatId(?string $vatId)
    {
        $this->vatId = $vatId;
    }

    /**
     * @return string
     */
    public function getIban(): string
    {
        return $this->iban;
    }

    /**
     * @param string|null $iban
     */
    public function setIban(?string $iban)
    {
        $this->iban = $iban;
    }

    /**
     * @return string
     */
    public function getBicOrSwift(): string
    {
        return $this->bicOrSwift;
    }

    /**
     * @param string|null $bicOrSwift
     */
    public function setBicOrSwift(?string $bicOrSwift)
    {
        $this->bicOrSwift = $bicOrSwift;
    }

    /**
     * @return string
     */
    public function getAccountHolder(): string
    {
        return $this->accountHolder;
    }

    /**
     * @param string|null $accountHolder
     */
    public function setAccountHolder(?string $accountHolder)
    {
        $this->accountHolder = $accountHolder;
    }

    /**
     * @return string
     */
    public function getEoriNumber(): string
    {
        return $this->eoriNumber;
    }

    /**
     * @param string|null $eoriNumber
     */
    public function setEoriNumber(?string $eoriNumber)
    {
        $this->eoriNumber = $eoriNumber;
    }

    /**
     * @return string
     */
    public function getCommercialRegisterEntry(): string
    {
        return $this->commercialRegisterEntry;
    }

    /**
     * @param string|null $commercialRegisterEntry
     */
    public function setCommercialRegisterEntry(?string $commercialRegisterEntry)
    {
        $this->commercialRegisterEntry = $commercialRegisterEntry;
    }

    /**
     * {@inheritDoc}
     */
    public function toArray(): array
    {
        return [
            'address_id' => $this->address_id,
            'address_key' => $this->address_key,
            'reference' => $this->reference,
            'company' => $this->company,
            'department' => $this->department,
            'salutation' => $this->salutation,
            'gender' => $this->gender,
            'date_of_birth' => $this->date_of_birth ? $this->date_of_birth->format('Y-m-d') : null,
            'firstname' => $this->firstname,
            'middlename' => $this->middlename,
            'lastname' => $this->lastname,
            'street' => $this->street,
            'care_of' => $this->careOf,
            'zip' => $this->zip,
            'city' => $this->city,
            'state_code' => $this->stateCode,
            'district' => $this->district,
            'country_code' => $this->countryCode,
            'phone' => $this->phone,
            'fax' => $this->fax,
            'mobile' => $this->mobile,
            'email' => $this->email,
            'vat_id' => $this->vatId,
            'eori_number' => $this->eoriNumber,
            'account_holder' => $this->accountHolder,
            'iban' => $this->iban,
            'bic_or_swift' => $this->bicOrSwift,
            'commercial_register_entry' => $this->commercialRegisterEntry,
        ];
    }
}

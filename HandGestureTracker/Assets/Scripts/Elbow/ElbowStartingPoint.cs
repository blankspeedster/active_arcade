using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using TMPro;

public class ElbowStartingPoint : MonoBehaviour
{
    public TMP_Text instruction;
    public GameObject thisStartingPoint, layerOfObjects;
    public Vector3 _rotation;
    public float _speed;
    // Start is called before the first frame update
    void Start()
    {
        layerOfObjects.SetActive(false);
        instruction.text = "Place your arm under the star and follow the arrow for the movement.";
    }

    // Update is called once per frame
    void Update()
    {
        PlayerPrefs.SetInt("isStartingPointHit", 0);
        transform.Rotate(_rotation * _speed * Time.deltaTime);
    }

    void OnCollisionEnter(Collision collision)
    {
        PlayerPrefs.SetInt("isStartingPointHit", 1);
        layerOfObjects.SetActive(true);
        thisStartingPoint.SetActive(false);
    }
}
